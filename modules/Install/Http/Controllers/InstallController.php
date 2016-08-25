<?php

namespace Modules\Install\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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


}
