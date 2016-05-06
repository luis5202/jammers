<?php 
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Order;
use Mail;
use App\OrderItem;
use App\ShippingDetail;
use Illuminate\Support\Facades\Input;

class PaypalController extends BaseController
{
	private $_api_context;
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
		//if(!\Session::has('cart')) \Session::put('cart', array());
        //f(!\Session::has('shipping')) \Session::put('shipping', array());
	}
	public function postPayment()
	{
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$items = array();
		$subtotal = 0;
		$cart = \Session::get('cart');
		$currency = 'MXN';
		foreach($cart as $producto){
			$item = new Item();
			$item->setName($producto->name)
			->setCurrency($currency)
			->setDescription($producto->extract)
			->setQuantity($producto->quantity)
			->setPrice($producto->price);
			$items[] = $item;
			$subtotal += $producto->quantity * $producto->price;
		}
		$item_list = new ItemList();
		$item_list->setItems($items);
		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0);
		$total = $subtotal + 0;
		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pedido de Jammers');
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		return \Redirect::route('cart-show')
			->with('error', 'Ups! Error desconocido.');
	}
	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
		$payerId = Input::get('PayerID');
		$token = Input::get('token');
		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('home')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(Input::get('PayerID'));
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved' ) { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar
			$this->saveOrder(\Session::get('cart'));			
			\Session::forget('cart');
			\Session::forget('shipping');
			return \Redirect::route('home')
				->with('message', 'Compra realizada de forma correcta');
		}		
		return \Redirect::route('home')
			->with('message', 'La compra fue cancelada');
	}

	private function saveOrder($cart)
	{
	    $subtotal = 0;
	    $shipping=0;
	    foreach($cart as $item){
	        $subtotal += $item->price * $item->quantity;
	    }    
	    
	    	
	    
	    if(\Auth::check())
	    {
		    $order = Order::create([
		        'subtotal' => $subtotal,
		        'shipping' => $shipping,
		        'user_id' => \Auth::user()->id
		    ]);
		}
		else
		{
			$order = Order::create([
		        'subtotal' => $subtotal,
		        'shipping' => 200,
		        'user_id' => 1
		    ]);
		}
	    
	    foreach($cart as $item){
	        $this->saveOrderItem($item, $order->id);	        
	    }

	    if(\Auth::check())
	    {
	    	$this->saveShippingAuth($order->id);
	    	//return \Session::get('cart');
	    	$this->sendMailUser(\Session::get('cart'));
	    	$this->sendMailAdmin(\Session::get('cart'));

	    }

	    else{
	    	$this->saveShippingNoAuth(\Session::get('shipping'), $order->id);
	    	$this->sendMailUserNoAuth(\Session::get('shipping'));
	    	$this->sendMailAdminNoAuth(\Session::get('shipping'));

	    }
	}
	
	private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			'quantity' => $item->quantity,
			'price' => $item->price,
			'product_id' => $item->id,
			'order_id' => $order_id
		]);
	}

	private function saveShippingAuth($order_id)
	{
	    	    
	    $shipping = ShippingDetail::create([
	        'name' => \Auth::user()->name,
	        'last_name' => \Auth::user()->last_name,
	        'email' => \Auth::user()->email,
	        'last_name' => \Auth::user()->last_name,
	        'user' => \Auth::user()->user,
	        'country' => \Auth::user()->country,
	        'state' => \Auth::user()->state,
	        'city' => \Auth::user()->city,
	        'colony' => \Auth::user()->colony,
	        'address' => \Auth::user()->address,
	        'post_code' => \Auth::user()->post_code,
	        'phone_number'=>\Auth::user()->phone_number,
	        'references_address' => \Auth::user()->references_address,
	        'order_id' => $order_id


	    ]);
	    
	    \Session::put('shipping', $shipping);
	    
	}

	private function saveShippingNoAuth($shipping, $order_id)
	{
	   \Session::put('shipping.order_id', $order_id);
	   \Session::get('shipping');
	    
	    $data = \Session::get('shipping');

	    $ship = ShippingDetail::create($data);
	    
	   
	}
	
	private function sendMailUser($cart)
	{	
		//return $cart;
		 $data = \Session::get('cart');
		//$data['messageLines'] = explode("\n", $cart->get('message'));

		Mail::send('emails.confirmCustumer', $data, function($message) use ($data) {
            $message->to(\Auth::user()->email);
                $message->subject('Confirmacion de compra');
        });
	}

	private function sendMailUserNoAuth($cart)
	{	
		//return $cart;
		 $data = \Session::get('shipping');
		 $data2= \Session::get('cart');
		//$data['messageLines'] = explode("\n", $cart->get('message'));

		Mail::send('emails.confirmCustumer', $data, function($message) use ($data) {
            $message->to($data['email']);
                $message->subject('Confirmacion de compra');
        });
	}

	private function sendMailAdmin($cart)
	{	
		//return $cart;
		 $data = \Session::get('cart');
		//$data['messageLines'] = explode("\n", $cart->get('message'));

		Mail::send('emails.confirmAdmin', $data, function($message) use ($data) {
            $message->to('luis.bahena.lopez@gmail.com');
                $message->subject('Aviso de compra');
        });
	}

	private function sendMailAdminNoAuth($cart)
	{	
		//return $cart;
		 $data = \Session::get('cart');
		//$data['messageLines'] = explode("\n", $cart->get('message'));

		Mail::send('emails.confirmAdmin', $data, function($message) use ($data) {
            $message->to('luis.bahena.lopez@gmail.com');
                $message->subject('Aviso de compra');
        });
	}

	
}