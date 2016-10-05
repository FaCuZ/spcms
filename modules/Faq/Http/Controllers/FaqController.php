<?php namespace Modules\Faq\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Modules\Faq\Models\FaqCategory;
use Modules\Faq\Models\Faq;

use Illuminate\Http\Request;

use Auth, DB;

class FaqController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['faq'] = Faq::all();

		$data['faq_categories'] = FaqCategory::all();

		return view('faq::index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

		$data['selected'] = $request->input('selected');

		$data['faq_categories'] = FaqCategory::all();

		return view('faq::create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$faq = new Faq();

		$faq->question = $request->input("question");
        $faq->answer = $request->input("answer");
        $faq->faq_category_id = $request->input("faq_category_id");

		$faq->save();

		return redirect()->route('admin.faq.index')->withErrors(['good' => 'Pregunta creada correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['faq'] = Faq::findOrFail($id);

		$data['faq_category'] = FaqCategory::find($data['faq']->faq_category_id);

		$data['tabla_1'] = DB::getSchemaBuilder()->getColumnListing('faq');
		$data['tabla_2'] = DB::getSchemaBuilder()->getColumnListing('faq_categories');

		return view('faq::show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['faq'] = Faq::findOrFail($id);
		
		$data['selected'] = $data['faq']->faq_category_id;

		$data['faq_categories'] = FaqCategory::all();

		return view('faq::edit', $data);
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
		$faq = Faq::findOrFail($id);

		$faq->question = $request->input("question");
        $faq->answer = $request->input("answer");
        $faq->faq_category_id = $request->input("faq_category_id");

		$faq->save();

		return redirect()->route('admin.faq.index')->withErrors(['good' => 'Pregunta actualizada correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$faq = Faq::findOrFail($id);
		$faq->delete();

		return redirect()->route('admin.faq.index')->withErrors(['good' => 'Pregunta borrada correctamente.']);
	}

}
