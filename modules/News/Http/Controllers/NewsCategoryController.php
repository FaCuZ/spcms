<?php namespace Modules\News\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Modules\News\Models\NewsCategory;
use Modules\News\Models\News;

use Modules\News\Http\Requests\NewsCategoryRequest;

use Illuminate\Http\Request;


use Auth;

class NewsCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news_categories = NewsCategory::all();

		return view('news::categories.index', compact('news_categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('news::categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(NewsCategoryRequest $request)
	{
		$news_category = new NewsCategory();

		$news_category->title = $request->input("title");

		$news_category->save();

		return redirect()->route('admin.noticias.index')->withErrors(['good' => 'Categoria creada correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$news_category = NewsCategory::findOrFail($id);

		return view('news::categories.show', compact('news_category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$news_category = NewsCategory::findOrFail($id);

		return view('news::categories.edit', compact('news_category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(NewsCategoryRequest $request, $id)
	{
		$news_category = NewsCategory::findOrFail($id);

		$news_category->title = $request->input("title");

		$news_category->save();

		return redirect()->route('admin.noticias.index')->withErrors(['good' => 'Caregoria actualizada correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$news_category = NewsCategory::findOrFail($id);
		$news_category->delete();

		return redirect()->route('admin.noticias.index')->withErrors(['good' => 'Categoria borrada correctamente.']);
	}

}
