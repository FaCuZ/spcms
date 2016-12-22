<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Exception;

use  Modules\Pages\Models\Page;

use DB;

class PagesController extends Controller
{

	public function getPage($page){
		try{
			$result = Page::where('active', 1)->where('title', $page)->take(1)->firstOrfail();

			return view($page);

		} catch(\Exception $e) {
			dd($e);
			abort(404);
		}

	}

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{
		$data['pages'] = Page::all();

		return view('pages::index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create(Request $request)
	{
		$data['selected'] = $request->input('selected');

		return view('pages::create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$page = new Page();

		$page->title = $request->input("title");
		$page->path = $request->input("path");
		$page->order = $request->input("order");
		if($request->input("active")) $page->active = $request->input("active");
		if($request->input("editable")) $page->editable = $request->input("editable");

		$page->save();

		return redirect()->route('admin.paginas.index')->withErrors(['good' => 'La pagina fue creada correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['pagina'] = Page::findOrFail($id);

		$data['tabla_1'] = DB::getSchemaBuilder()->getColumnListing('faq');

		$data['historial_1'] = $data['pagina']->revisionHistory;

		return view('pages::show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * @return Response
	 */
	public function edit($id)
	{
		$data['pagina'] = Page::findOrFail($id);
		
		return view('pages::edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 * @param  Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$page = Page::findOrFail($id);

		$page->title = $request->input("title");
		$page->path = $request->input("path");
		$page->order = $request->input("order");
		if($request->input("active")) $page->active = $request->input("active");
		if($request->input("editable")) $page->editable = $request->input("editable");

		$page->save();

		return redirect()->route('admin.paginas.index')->withErrors(['good' => 'Pagina actualizada correctamente.']);

	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = Page::findOrFail($id);
		$page->delete();

		return redirect()->route('admin.paginas.index')->withErrors(['good' => 'Pagina borrada correctamente.']);
	}
}
