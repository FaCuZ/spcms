<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Theme, Mail, URL;

class MainController extends Controller
{

    public function index()
	{
		$active = config('theme.themeActive');

		$theme = Theme::uses($active)->layout('base');

		return $theme->watch('index')->render();
	}

	public function showAlerta(){
		return view('errors.sinrole');
	}

	public function sendEmail(Request $request){
		$nombre = $request->input('nombre');
		$email = $request->input('email');
		$texto = $request->input('texto');

		Mail::send('admin::emailContacto', ['nombre' => $nombre, 'texto' => $texto, 'email' => $email], function ($message) use ($nombre,$email)
		{
			$message->from($email, $nombre);
			$message->to(env('CONTACT_TO'));
			$message->replyTo($email, $nombre);
			$message->subject("[". env('CLIENT_NAME') ."] ". $nombre . " te envio un mensaje desde la pagina web");

		});

		return redirect()->route('main')->withErrors(['good' => 'Recibirás una respuesta nuestra cuanto antes podamos.']);
	}

}
