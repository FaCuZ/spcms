<?php

namespace Modules\Support\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth, Mail;

class SupportController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{

		$email = Auth::user()->email;

		return view('support::index', compact('email'));
	}
	

	public function sendMail(Request $request)
	{

		$asunto = $request->input('asunto');
		$mensaje = $request->input('mensaje');
		$email = $request->input('email');
		$responder = "Responder a: <a href='mailto:".$email."' target='_top'>".$email."</a>";


		Mail::send('admin::email', ['asunto' => $asunto, 'mensaje' => $mensaje, 'email' => $email, 'responder' => $responder], function ($message) use ($asunto,$email)
		{
			$message->from(env('CONTACT_FROM'), env('CONTACT_FROM_NAME'));
			$message->to(env('CONTACT_TO'));			
			$message->subject("[". env('CLIENT_NAME') ."] ". $asunto);
			$message->replyTo($email, $name = null);
		});

		return redirect()->route('admin.inicio')->withErrors(['good' => 'Mensaje enviado correctamente.']);

	}
}
