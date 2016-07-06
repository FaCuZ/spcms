<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use App\Album;
use App\Gallery;

use Illuminate\Http\Request;

use Auth;

class ImageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$albums = Album::all();

		$images = Image::orderBy('id', 'desc')->paginate(10);

		$rol = Auth::user()->role;

		return view('admin.images.index', compact(['images','albums','rol']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$gallery_id = $request->input('gallery');
 		$gallery = Gallery::findOrFail($gallery_id);

		return view('admin.images.create', compact('gallery'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$image = new Image();

		$image->title = $request->input("title");
        $image->description = $request->input("description");
        $image->gallery_id = $request->input("gallery_id");

		$image->save();

		return redirect()->route('admin.imagenes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$image = Image::findOrFail($id);

		$rol = Auth::user()->role;

		return view('admin.images.show', compact(['image','rol']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$image = Image::findOrFail($id);
		
		$rol = Auth::user()->role;

		return view('admin.images.edit', compact(['image','rol']));
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
		$image = Image::findOrFail($id);

		$image->title = $request->input("title");
        $image->description = $request->input("description");

		$image->save();

		return redirect()->route('admin.imagenes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$image = Image::findOrFail($id);
		$image->delete();

		return redirect()->route('admin.imagenes.index')->with('message', 'Item deleted successfully.');
	}

}
