<?php namespace Modules\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App, Artisan, Setting, File;

use Venturecraft\Revisionable\Revision;

class AdminController extends Controller
{
	public function showInicio(){
		$data['down'] = App::isDownForMaintenance();
		
		$data['cache'] = cacheStatus();

		return view('admin::inicio', $data);
	}

	public function showTemas(){
		return view('admin::temas');
	}

	public function showPaginas(){
		return view('admin::paginas');
	}

	public function showHistorial(){

		$data['history'] = Revision::with('revisionable')->orderBy('id', 'desc')->paginate(10);

		return view('admin::historial', $data);
	}

	public function edicion()
	{
		return view('index');
	}

	public function borrarCache(){
		clearCache();

		return redirect()->route('admin.inicio')->withErrors(['good' => 'El cache se borro correctamente.']);
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

	public function cacheOn()
	{
		File::put(base_path('bootstrap/cache/CACHE'),'');

		return redirect()->route('admin.inicio')->withErrors(['good' => 'El sistema de cache fue ACTIVADO.']);
	}

	public function cacheOff()
	{		
		File::delete(base_path('bootstrap/cache/CACHE'));

		return redirect()->route('admin.inicio')->withErrors(['alert' => 'El sistema de cache fue DESACTIVADO. Es importante no dejar desactivado por mucho tiempo.']);
	}

}