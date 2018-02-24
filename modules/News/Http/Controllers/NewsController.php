<?php namespace Modules\News\Http\Controllers;

use Illuminate\Routing\Controller;

use Modules\News\Models\NewsCategory;
use Modules\News\Models\News;

use Illuminate\Http\Request;
use Modules\News\Http\Requests\NewsRequest;

use Auth, DB, Theme;

class NewsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{
		// $data['news'] = News::paginate(3)->sortByDesc('created_at');
		$data['news'] = News::latest()->paginate(4);

		$data['news_categories'] = NewsCategory::all();

		return view('news::index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create(Request $request)
	{
		$data['selected'] = $request->input('selected');

		$data['news_categories'] = NewsCategory::all();

		return view('news::create', $data);
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
		
		if($request->input("important")) $news->important = 1;
		
		$news->news_category_id = $request->input("news_category_id");

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
		$data['news_category'] = NewsCategory::find($data['news']->news_category_id);

		$data['tabla_1'] = DB::getSchemaBuilder()->getColumnListing('news');
		$data['tabla_2'] = DB::getSchemaBuilder()->getColumnListing('news_categories');
		
		$data['historial_1'] = $data['news']->revisionHistory;
		$data['historial_2'] = $data['news_category']->revisionHistory;

		return view('news::show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * @return Response
	 */
	public function edit($id)
	{
		$data['news'] = News::findOrFail($id);

		$data['selected'] = $data['news']->news_category_id;

		$data['news_categories'] = NewsCategory::all();

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
		$news->news_category_id = $request->input("news_category_id");

		if($request->input("important")) {
			$news->important = 1;
		} else {
			$news->important = 0;
		}

		$news->save();

		return redirect()->route('admin.noticias.index')->withErrors(['good' => 'Noticia actualizada correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
		$news = News::findOrFail($id);
		$news->delete();

		return redirect()->route('admin.noticias.index')->withErrors(['good' => 'Noticia borrada correctamente.']);
	}



	public function noticia($id)
	{
		// Se tiene que crear en views un archivo noticia.blade.php
		try {
			
			$data['noticia'] = News::findOrFail($id);

			return Theme::view(['view' => 'noticia', 'args' => $data]);
		} catch (\InvalidArgumentException $e) {
			abort(404);
		}
	}

}
