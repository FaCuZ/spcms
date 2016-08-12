<?php namespace Modules\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;

use Auth, Mail, App, Artisan;

class AdminController extends Controller
{
	public function showInicio(){
		$down = App::isDownForMaintenance();

		return view('admin::inicio', compact('down'));
	}

	public function showEmails(){
		return view('admin::emails');
	}

	public function showAyuda(){
		
		$email = Auth::user()->email;

		return view('admin::ayuda', compact('email'));
	}

	public function showHistorial(){

		if(Auth::user()->role=='admin'){
			return view('admin::historial');
		} else {
			return redirect()->route('admin.inicio');
		}

	}

	public function edicion()
	{
		return view('index');
	}

	public function up()
	{
		Artisan::call('up');

		return redirect()->route('admin.inicio')->withErrors(['good' => 'La pagina ahora es visible al publico.']);
	}

	public function down()
	{
		Artisan::call('down');

		return redirect()->route('admin.inicio')->withErrors(['alert' => 'La pagina entro en modo mantenimiento. Nadie podra verla hasta que se active de nuevo.']);
	}


	public function sendMailSoporte(Request $request)
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


	public function sendMailEmail(Request $request)
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
