<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Theme;

class MainController extends Controller
{

    public function index()
	{
		$active = config('theme.themeActive');

		$theme = Theme::uses($active)->layout('base');

		return $theme->watch('index')->render();
	}

	public function showAlerta(){
		return view('errors.sinrole');
	}

}
