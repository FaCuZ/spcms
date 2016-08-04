<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use App\Album;
use App\Gallery;

use Illuminate\Http\Request;

use Auth;
use ImageI;

class ImageController extends Controller {

	/**
	 * Display a listing nesting resources.
	 *
	 * @return Response
	 */
	public function index()
	{
		$albums = Album::all();

		$images = Image::all();

		$rol = Auth::user()->role;

		return view('admin.images.index', compact(['images','albums','rol']));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function lista()
	{
		$albums = Album::all();

		$images = Image::all();

		$rol = Auth::user()->role;

		return view('admin.images.list', compact(['images','albums','rol']));
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
		if (!$request->hasFile('file')) {
			return redirect()->route('admin.imagenes.create')->withErrors('error', 'Elija un archivo');
		}

		$image = new Image();

		$image->title = $request->input("title");
		$image->description = $request->input("description");        
		$image->gallery_id = $request->input("gallery_id");


		$file = $request->file;		
		$imageFile = ImageI::make($request->file);

  		$path = 'images/uploads/';
		$name = time()."-".preg_replace("/[^A-Za-z0-9-_\.]/", "", $image->title);
		$extension = $file->getClientOriginalExtension();

  		$image->file = $path.$name.".".$extension;
 
	   	$imageFile->save($image->file);
		
		$imageFile->fit(155,155);

		$image->thumb = $path.$name."-thumb.".$extension;
		$imageFile->save($image->thumb);

		$image->save();


		return redirect()->route('admin.imagenes.index')->withErrors(['good' => 'Imagen creada correctamente.']);
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

		if ($request->hasFile('file')) {
			$file = $request->file;
			$imageFile = ImageI::make($request->file);

	  		$path = 'images/uploads/';
			$name = time()."-".preg_replace("/[^A-Za-z0-9-_\.]/", "", $image->title);
			$extension = $file->getClientOriginalExtension();

	  		$image->file = $path.$name.".".$extension;
	 
		   	$imageFile->save($image->file);
			
			$imageFile->fit(155,155);

			$image->thumb = $path.$name."-thumb.".$extension;
			$imageFile->save($image->thumb);
		}


		$image->save();

		return redirect()->route('admin.imagenes.index')->withErrors(['good' => 'Imagen actualizada correctamente.']);
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

		return redirect()->route('admin.imagenes.index')->withErrors(['good' => 'Imagen borrada correctamente.']);
	}

}
