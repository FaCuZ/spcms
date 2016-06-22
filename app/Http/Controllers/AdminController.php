<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

use Auth;

class AdminController extends Controller
{
	public function showInicio(){
		return view('admin.inicio');
	}

	public function showTextos(){
		return view('admin.textos');
	}
	
	public function showImagenes(){
		return view('admin.imagenes');
	}

	public function showEmails(){
		return view('admin.emails');
	}

	public function showAyuda(){
		return view('admin.ayuda');
	}

	public function showAlerta(){
		return view('errors.sinrole');
	}

}
