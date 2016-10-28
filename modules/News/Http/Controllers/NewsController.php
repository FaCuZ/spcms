<?php namespace Modules\News\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\News\Models\News;

use Auth, DB;

class NewsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{
		$data['news'] = News::all();

		return view('news::index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create()
	{
		return view('news::create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$news = new News();

		$news->title = $request->input("title");
		$news->body = $request->input("body");

		$news->save();

		return redirect()->route('admin.noticias.index')->withErrors(['good' => 'Noticia creada correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['news'] = News::findOrFail($id);

		$data['tabla_1'] = DB::getSchemaBuilder()->getColumnListing('news');
		
		$data['historial_1'] = $data['news']->revisionHistory;

		return view('news::show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * @return Response
	 */
	public function edit($id)
	{
		$data['news'] = News::findOrFail($id);

		return view('news::edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 * @param  Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$news = News::findOrFail($id);

		$news->title = $request->input("title");
		$news->body = $request->input("body");

		$news->save();

		return redirect()->route('admin.noticias.index')->withErrors(['good' => 'Noticia actualizada correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function destroy($id)
	{	
		$news = News::findOrFail($id);
		$news->delete();

		return redirect()->route('admin.noticias.index')->withErrors(['good' => 'Noticia borrada correctamente.']);
	}
}
