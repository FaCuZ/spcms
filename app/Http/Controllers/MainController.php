<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Text, App\Album, App\Image;

class MainController extends Controller
{

    public function index()
	{

		$textos = Text::all()->keyBy('title');
		//$textos = Text::all()->toArray();

		$albums = Album::all()->keyBy('title');

		//dd($albums->get('estructura')->galerias->keyBy('title')->get('Logos')->imagenes->keyBy('title')->get('principal')->file);

		$imagenesBase = Image::where("gallery_id", "=", "1")->get()->keyBy('title');		
		// $images = Image::all()->keyBy('title');		

	//	dd($imagenesBase);

		return view('offline', compact(['textos', 'imagenesBase','albums']));
	}
}
