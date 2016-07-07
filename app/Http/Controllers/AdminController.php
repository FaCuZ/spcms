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

	public function showEmails(){
		return view('admin.emails');
	}

	public function showAyuda(){
		$email = Auth::user()->email;
		return view('admin.ayuda', compact('email'));
	}

	public function showAlerta(){
		return view('errors.sinrole');
	}

}
