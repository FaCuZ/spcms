<?php namespace Modules\Links\Http\Controllers;

use App\Http\Controllers\Controller;

use Modules\Links\Models\LinkCategory;
use Modules\Links\Models\Link;

use Modules\Links\Http\Requests\LinkRequest;

use Illuminate\Http\Request;

use Auth, DB;

class LinkController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['links'] = Link::all();

		$data['link_categories'] = LinkCategory::all();

		return view('links::index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$data['selected'] = $request->input('selected');

		$data['link_categories'] = LinkCategory::all();

		return view('links::create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(LinkRequest $request)
	{
		$link = new Link();

		$link->title = $request->input("title");
		$link->url = $request->input("url");
		$link->link_category_id = $request->input("link_category_id");

		$link->save();

		return redirect()->route('admin.links.index')->withErrors(['good' => 'Link creado correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['link'] = Link::findOrFail($id);
		$data['link_category'] = LinkCategory::find($data['link']->link_category_id);


		$data['tabla_1'] = DB::getSchemaBuilder()->getColumnListing('links');
		$data['tabla_2'] = DB::getSchemaBuilder()->getColumnListing('link_categories');
		
		$data['historial_1'] = $data['link']->revisionHistory;
		$data['historial_2'] = $data['link_category']->revisionHistory;

		return view('links::show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['link'] = Link::findOrFail($id);
		
		$data['selected'] = $data['link']->link_category_id;

		$data['link_categories'] = LinkCategory::all();

		return view('links::edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(LinkRequest $request, $id)
	{
		$link = Link::findOrFail($id);

		$link->title = $request->input("title");
		$link->url = $request->input("url");
		$link->link_category_id = $request->input("link_category_id");

		$link->save();

		return redirect()->route('admin.links.index')->withErrors(['good' => 'Link actualizado correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$link = Link::findOrFail($id);
		$link->delete();

		return redirect()->route('admin.links.index')->withErrors(['good' => 'Link borrado correctamente.']);
	}

}
