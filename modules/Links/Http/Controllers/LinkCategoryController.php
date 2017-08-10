<?php namespace Modules\Links\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Modules\Links\Models\LinkCategory;
use Modules\Links\Models\Link;

use Modules\Links\Http\Requests\LinkCategoryRequest;

use Illuminate\Http\Request;


use Auth;

class LinkCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$link_categories = LinkCategory::all();

		return view('links::categories.index', compact('link_categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('links::categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(LinkCategoryRequest $request)
	{
		$link_category = new LinkCategory();

		$link_category->title = $request->input("title");

		$link_category->save();

		return redirect()->route('admin.links.index')->withErrors(['good' => 'Categoria creada correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$link_category = LinkCategory::findOrFail($id);

		return view('links::categories.show', compact('link_category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$link_category = LinkCategory::findOrFail($id);

		return view('links::categories.edit', compact('link_category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(LinkCategoryRequest $request, $id)
	{
		$link_category = LinkCategory::findOrFail($id);

		$link_category->title = $request->input("title");

		$link_category->save();

		return redirect()->route('admin.links.index')->withErrors(['good' => 'Caregoria actualizada correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$link_category = LinkCategory::findOrFail($id);
		$link_category->delete();

		return redirect()->route('admin.links.index')->withErrors(['good' => 'Categoria borrada correctamente.']);
	}

}
