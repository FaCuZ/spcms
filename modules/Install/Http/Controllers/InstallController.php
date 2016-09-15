<?php

namespace Modules\Install\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

use Setting;

class InstallController extends Controller
{

	public function index()
	{
		return view('install::index');
	}

	public function showRequisitos()
	{
		return view('install::requisitos');
	}

	public function showConfiguracion()
	{
		return view('install::configuracion');
	}

	public function showEntorno()
	{
		return view('install::entorno');
	}

	public function showBaseDeDatos()
	{
		return view('install::basededatos');
	}

	public function showUsuario()
	{
		return view('install::usuario');
	}


	public function storeConfiguracion(Request $request){
		Setting::reset();
 
		Setting::set('pagina.nombre', 		 $request->input('nombre'));
		Setting::set('pagina.dominio', 		 $request->input('dominio'));
		Setting::set('pagina.emails.activo', $request->input('emails') ? "activo" : "");
		Setting::set('pagina.emails.webmail',$request->input('webmail'));
		Setting::set('pagina.emails.email',  $request->input('email-base'));
		Setting::set('pagina.emails.soporte',$request->input('email-soporte'));

		Setting::save();

		return redirect()->route('install.basededatos');
	}


	public function storeBaseDeDatos(Request $request){

		return redirect()->route('install.entorno');
	}

	public function storeEntorno(Request $request){

		return redirect()->route('install.usuario');
	}

	public function storeUsuario(Request $request){

		return redirect()->route('admin.inicio');
	}

}
