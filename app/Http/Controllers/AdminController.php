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

	public function sendMail(Request $request)
	{

		$asunto = $request->input('asunto');
		$mensaje = $request->input('mensaje');
		$email = $request->input('email');


		Mail::send('admin.email', ['asunto' => $asunto, 'mensaje' => $mensaje, 'email' => $email], function ($message) use ($asunto,$email)
		{
			$message->from('web@indis.com.ar', 'Web');
			$message->to('fzaldo@gmail.com');			
			$message->subject("[". env('CLIENT_NAME') ."] ". $asunto);
			$message->replyTo($email, $name = null);
		});

		return redirect()->route('admin.inicio')->with('message', 'Mensaje enviado!');

		//return response()->json(['message' => 'Request completed']);
	}


}
