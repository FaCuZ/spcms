<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Text, App\Album, App\Image;

use Artisan;

class MainController extends Controller
{

    public function index()
	{
		return view('index');
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
}
