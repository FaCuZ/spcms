<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{

    public function index()
	{
		return view('index');
	}

	public function showAlerta(){
		return view('errors.sinrole');
	}

}
