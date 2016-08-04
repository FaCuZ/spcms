<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TextCategory;
use App\Text;
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

		$rol = Auth::user()->role;

		return view('admin.textcategories.index', compact(['text_categories','rol']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.textcategories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
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

		$rol = Auth::user()->role;

		return view('admin.textcategories.show', compact(['text_category','rol']));
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

		$rol = Auth::user()->role;

		return view('admin.textcategories.edit', compact(['text_category','rol']));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
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
