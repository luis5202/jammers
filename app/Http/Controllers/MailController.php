<?php

namespace App\Http\Controllers;
use Mail;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;


class MailController extends Controller
{

	public function store(Request $request)
	{
		 $mail=Mail::send('emails.contact',$request->all(), function($msj){
            $msj->subject('Correo de Contacto');
            $msj->to('luis.bahena.lopez@gmail.com');
        });
        $message = $mail ? 'Mensaje enviado correctamente!' : 'Error al enviar el mensaje!';
        
        return redirect()->route('contact')->with('message', $message);

		

	}
    //
}