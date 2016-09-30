<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Module, Artisan;

class ModuleController extends Controller
{

	public function index(){

		$data['modulos'] = Module::all();

		return view('admin::modulos', $data);
	}

	public function activate(Request $request)
	{
		Module::enable($request->input('name'));

		return redirect()->route('admin.modulos')->withErrors(['good' => 'El modulo se activo correctamente.']);
	}

	public function deactivate(Request $request)	
	{
		Module::disable($request->input('name'));

		return redirect()->route('admin.modulos')->withErrors(['alert' => 'El modulo se desactivo correctamente.']);
	}

}
