<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

use Auth, Mail;

class AdminController extends Controller
{
	public function showInicio(){
		return view('admin.inicio');
	}

	public function showEmails(){
		return view('admin.emails');
	}

	public function showAyuda(){
		$email = Auth::user()->email;
		return view('admin.ayuda', compact('email'));
	}

	public function showAlerta(){
		return view('errors.sinrole');
	}

	public function sendMailSoporte(Request $request)
	{

		$asunto = $request->input('asunto');
		$mensaje = $request->input('mensaje');
		$email = $request->input('email');
		$responder = "Responder a: <a href='mailto:".$email."' target='_top'>".$email."</a>";


		Mail::send('admin.email', ['asunto' => $asunto, 'mensaje' => $mensaje, 'email' => $email, 'responder' => $responder], function ($message) use ($asunto,$email)
		{
			$message->from(env('CONTACT_FROM'), env('CONTACT_FROM_NAME'));
			$message->to(env('CONTACT_TO'));			
			$message->subject("[". env('CLIENT_NAME') ."] ". $asunto);
			$message->replyTo($email, $name = null);
		});

		return redirect()->route('admin.inicio')->with('message', 'Mensaje enviado!');

		//return response()->json(['message' => 'Request completed']);
	}


	public function sendMailEmail(Request $request)
	{

		$asunto = $request->input('asunto');
		$mensaje = $request->input('mensaje');
		$email = $request->input('email');
		dd($asunto);

		Mail::send('admin.email', ['asunto' => $asunto, 'mensaje' => $mensaje, 'email' => $email], function ($message) use ($asunto)
		{
			$message->from('web@indis.com.ar', 'Web');
			$message->to('fzaldo@gmail.com');			
			$message->subject("[". env('CLIENT_NAME') ."] ". $asunto);
		});

		return redirect()->route('admin.inicio')->with('message', 'Mensaje enviado!');

		//return response()->json(['message' => 'Request completed']);
	}

}
