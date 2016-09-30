<?php namespace Modules\Faq\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Modules\Faq\Models\FaqCategory;
use Modules\Faq\Models\Faq;

use Illuminate\Http\Request;

use Auth;

class FaqCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faq_categories = FaqCategory::all();

		return view('faq::categories.index', compact('faq_categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('faq::categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$faq_category = new FaqCategory();

		$faq_category->title = $request->input("title");

		$faq_category->save();

		return redirect()->route('admin.faq.index')->withErrors(['good' => 'Categoria creada correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$faq_category = FaqCategory::findOrFail($id);

		return view('faq::categories.show', compact('faq_category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$faq_category = FaqCategory::findOrFail($id);

		return view('faq::categories.edit', compact('faq_category'));
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
		$faq_category = FaqCategory::findOrFail($id);

		$faq_category->title = $request->input("title");

		$faq_category->save();

		return redirect()->route('admin.faq.index')->withErrors(['good' => 'Caregoria actualizada correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$faq_category = FaqCategory::findOrFail($id);
		$faq_category->delete();

		return redirect()->route('admin.faq.index')->withErrors(['good' => 'Categoria borrada correctamente.']);
	}

}
