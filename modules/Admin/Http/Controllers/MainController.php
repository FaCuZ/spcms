<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use Theme, Mail, URL;

class MainController extends Controller
{

    public function index()
	{
		return Theme::view('index');
	}

    public function page($page)
	{
		try {
			return Theme::view($page);
		} catch (\InvalidArgumentException $e) {
			abort(404);
		}
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
			//$message->from($email, $nombre); // Lo saque porque la proteccion de gmail
			$message->to(config('app.client.email'));
			$message->replyTo($email, $nombre);
			$message->subject("[". config('app.client.name') ."] ". $nombre . " te envio un mensaje desde la pagina web");

		});

		return redirect()->route('main')->withErrors(['good' => 'Recibirás una respuesta nuestra cuanto antes podamos.']);
	}

}
