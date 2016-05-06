<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\ShippingDetail;
class CartController extends Controller
{
	public function __construct()
	{
		if(!\Session::has('cart')) \Session::put('cart', array());
        if(!\Session::has('shipping')) \Session::put('shipping', array());
	}
    // Show cart
    public function show()
    {

    	$cart = \Session::get('cart');
        if(count($cart)){
    	$total = $this->total();
        if ($total<= 200 && $$total>0)
         {

            
            $this->deleteShippingProduct();
            $total= $this->total();
            $cart = \Session::get('cart');
            return view('store.cart', compact('cart', 'total'));
         }
         elseif($total>= 2000)
         {
            $this->deleteShippingProduct();
            $total= $this->total();
            $cart = \Session::get('cart');
            return view('store.cart', compact('cart', 'total'));
         }
         elseif ($total>200 && $total<2000) {
             $this->addShippingProduct();
            $total= $this->total();
            $cart = \Session::get('cart');   
            return view('store.cart', compact('cart', 'total'));
         }
         else 
         {
            return view('store.cart', compact('cart', 'total'));
         }
     }
    	return view('store.cart', compact('cart', 'total'));
    }
    // Add item
    public function add(Product $product)
    {
    	$cart = \Session::get('cart');
    	$product->quantity = 1;
    	$cart[$product->slug] = $product;
    	\Session::put('cart', $cart);
    	return redirect()->route('cart-show');
    }
    // Delete item
    public function delete(Product $product)
    {
    	$cart = \Session::get('cart');
    	unset($cart[$product->slug]);
    	\Session::put('cart', $cart);
    	return redirect()->route('cart-show');
    }
    // Update item
    public function update(Product $product, $quantity)
    {
    	$cart = \Session::get('cart');
    	$cart[$product->slug]->quantity = $quantity;
    	\Session::put('cart', $cart);
    	return redirect()->route('cart-show');
    }
    // Trash cart
    public function trash()
    {
    	\Session::forget('cart');
    	return redirect()->route('cart-show');
    }
    // Total
    private function total()
    {
    	$cart = \Session::get('cart');
    	$total = 0;
    	foreach($cart as $item){
    		$total += $item->price * $item->quantity;
    	}
         
            return $total;

         
    	
    }
    // Detalle del pedido
    public function orderDetail()
    {
        if(count(\Session::get('cart')) <= 0) return redirect()->route('home');
        $cart = \Session::get('cart');
        $total = $this->total();
        if ($total< 2000)
         {

            $this->addShippingProduct();
            $total= $this->total();
            $cart = \Session::get('cart');   
            //return $cart;         
            return view('store.order-detail', compact('cart', 'total'));
         }
         else
         {
            $this->deleteShippingProduct();
            $total= $this->total();
            $cart = \Session::get('cart');
            return view('store.order-detail', compact('cart', 'total'));
         }
    }

    private function addShippingProduct()
    {
              
        $product= Product::where('slug', 'shipping-cost')->first();        
        //if(count(\Session::get('cart.slug')=='shipping-cost') > 0)
        //{
            $cart = \Session::get('cart');
            $product->quantity = 1;
            $cart[$product->slug] = $product;
            \Session::put('cart', $cart);
        //}

        
        

    }

    private function deleteShippingProduct()
    {
        
        $product= Product::where('slug', 'shipping-cost')->first();
        $cart = \Session::get('cart');

        unset($cart[$product->slug]);
        \Session::put('cart', $cart);
        
        
    }


     public function shippingDetail(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|max:100',
            'last_name'     => 'required|max:100',
            'email'         => 'required|email',            
            'address'       => 'required',
            'country'       => 'required',
            'state'         => 'required',
            'city'          => 'required',
            'colony'        => 'required',
            'post_code'     => 'required',
            'phone_number'  => 'required|min:10|max:10'
        ]);

        $data = [
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'user'          => 'usuario',            
            'address'       => $request->get('address'),
            'country'       => $request->get('country'),
            'state'         => $request->get('state'),
            'city'          => $request->get('city'),
            'colony'        => $request->get('colony'),
            'post_code'     => $request->get('post_code'),
            'phone_number'  => $request->get('phone_number'),
            'references_address'=> $request->get('references_address')
        ];
        \Session::put('shipping', $data);
        
        return redirect()->route('payment');
    }
}