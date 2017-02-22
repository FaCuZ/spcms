<?php namespace Modules\Texts\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Modules\Texts\Models\TextCategory;
use Modules\Texts\Models\Text;

use Modules\Texts\Http\Requests\TextCategoryRequest;

use Illuminate\Http\Request;


use Auth;

class TextCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$text_categories = TextCategory::all();

		return view('texts::categories.index', compact('text_categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('texts::categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(TextCategoryRequest $request)
	{
		$text_category = new TextCategory();

		$text_category->title = $request->input("title");

		$text_category->save();

		return redirect()->route('admin.textos.index')->withErrors(['good' => 'Categoria creada correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$text_category = TextCategory::findOrFail($id);

		return view('texts::categories.show', compact('text_category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$text_category = TextCategory::findOrFail($id);

		return view('texts::categories.edit', compact('text_category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(TextCategoryRequest $request, $id)
	{
		$text_category = TextCategory::findOrFail($id);

		$text_category->title = $request->input("title");

		$text_category->save();

		return redirect()->route('admin.textos.index')->withErrors(['good' => 'Caregoria actualizada correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$text_category = TextCategory::findOrFail($id);
		$text_category->delete();

		return redirect()->route('admin.textos.index')->withErrors(['good' => 'Categoria borrada correctamente.']);
	}

}
