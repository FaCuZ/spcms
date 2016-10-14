<?php

namespace Modules\Email\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth, Mail;

class EmailController extends Controller
{

	public function index()
	{
		return view('email::index');
	}

	public function sendMail(Request $request)
	{

		$accion = $request->input('accion');
		$asunto = $request->input('asunto');
		$email = $request->input('email');
		
		$password = $request->input('password');
		$new_password = $request->input('new_password');

		$mensaje = "<p><strong>Email: </strong>".$email."<p>";
		$mensaje .= "<p><strong>Contraseña: </strong>".$password."<p>";
		if($accion == "cambio"){
			$mensaje .= "<p><strong>Nueva contraseña: </strong>".$new_password."<p>";
		}
		$mensaje .= "<p><strong>Comentario: </strong>".$request->input('mensaje')."<p>";

		$responder = "<p><strong>Responder a: </strong><a href='mailto:".Auth::user()->email."' target='_top'>".Auth::user()->email."</a></p>";

		Mail::send('admin::email', ['asunto' => $asunto, 'mensaje' => $mensaje, 'email' => $email, 'responder' => $responder], function ($message) use ($asunto)
		{
			$message->from('web@indis.com.ar', 'Web');
			$message->to('fzaldo@gmail.com');           
			$message->subject("[". env('CLIENT_NAME') ."] PEDIDO: ". $asunto);

		});


		return redirect()->route('admin.inicio')->withErrors(['good' => 'Pedido enviado correctamente.']);

	}

}
