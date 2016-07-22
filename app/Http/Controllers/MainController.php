<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Text, App\Album, App\Image;

class MainController extends Controller
{

    public function index()
	{

		return view('offline');

		$textos = Text::Texto("test");
		dd($textos);

		/*
		$textos = Text::Textos();
		dd($textos->get("test")->show);
		*/




		$albums = Album::all()->keyBy('title');

		//dd($albums->get('estructura')->galerias->keyBy('title')->get('Logos')->imagenes->keyBy('title')->get('principal')->file);

		//$imagenesBase = Image::where("title", "=", "Base")->get()->keyBy('title');	
		$imagenesBase = $albums->get('Base')->galerias->keyBy('title');
		// $images = Image::all()->keyBy('title');		

		dd($imagenesBase->get('Logos')->imagenes->keyBy('title'));

		return view('offline', compact(['textos', 'imagenesBase', 'albums']));
	}

	public function edicion(){

		$textos = Text::all()->keyBy('title');
		$albums = Album::all()->keyBy('title');

		$imagenesBase = Image::where("gallery_id", "=", "1")->get()->keyBy('title');		

		return view('pagina', compact(['textos', 'albums', 'imagenesBase']));
	}
}
