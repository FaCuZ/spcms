<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gallery;
use App\Album;
use Illuminate\Http\Request;

use Auth;

class GalleryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = Gallery::orderBy('id', 'desc')->paginate(10);

		$rol = Auth::user()->role;

		return view('admin.galleries.index', compact(['galleries','rol']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  int  $album_id
	 * @return Response
	 */
	public function create(Request $request)
	{

 		$album_id = $request->input('album');
 		$album = Album::findOrFail($album_id);

		return view('admin.galleries.create', compact('album'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$gallery = new Gallery();

		$gallery->title = $request->input("title");
        $gallery->description = $request->input("description");
        $gallery->album_id = $request->input("album_id");

		$gallery->save();

		return redirect()->route('admin.galerias.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gallery = Gallery::findOrFail($id);

		$rol = Auth::user()->role;

		return view('admin.galleries.show', compact(['gallery','rol']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallery = Gallery::findOrFail($id);

		$rol = Auth::user()->role;
		
		return view('admin.galleries.edit', compact(['gallery','rol']));
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
		$gallery = Gallery::findOrFail($id);

		$gallery->title = $request->input("title");
        $gallery->description = $request->input("description");

		$gallery->save();

		return redirect()->route('admin.galerias.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$gallery = Gallery::findOrFail($id);
		$gallery->delete();

		return redirect()->route('admin.galerias.index')->with('message', 'Item deleted successfully.');
	}

}
