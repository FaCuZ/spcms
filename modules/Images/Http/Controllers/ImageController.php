<?php namespace Modules\Images\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Modules\Images\Models\Image;
use Modules\Images\Models\Album;
use Modules\Images\Models\Gallery;

use Modules\Images\Http\Requests\ImageRequest;
use Illuminate\Http\Request;

use Auth, DB;
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

		return view('images::images.index', compact(['images','albums']));
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

		return view('images::images.list', compact(['images','albums']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$data['galleries'] = Gallery::all();
		$data['selected'] = $request->input('selected');

		return view('images::images.create', $data);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(ImageRequest $request)
	{
		if (!$request->hasFile('file')) {
			return redirect()->route('admin.imagenes.create')->withErrors('error', 'Elija un archivo');
		}

		$image = new Image();

		$image->title = $request->input("title");
		$image->description = $request->input("description");        
		$image->gallery_id = $request->input("gallery_id");


		$file = $request->file;		

		$imageFile = ImageI::make($file);

		$imageFile->resize(1280, 1280, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});	

  		$path = 'images/uploads/';
		
		$name = time();
		if($image->title){
			$name = $name."-".preg_replace("/[^A-Za-z0-9-_\.]/", "", $image->title);
		}

		$extension = $file->getClientOriginalExtension();

  		$image->file = $path.$name.".".$extension;
 
	   	$imageFile->save($image->file);
		
		$imageFile->fit(155,155);

		$image->thumb = $path.$name."-thumb.".$extension;
		$imageFile->save($image->thumb);

		$image->save();

		if($request->input("default_image_id")){
			$galeria = Gallery::find($image->gallery_id);
			$galeria->default_image_id = $image->id;
			$galeria->save();
		} 


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
		$data['image'] 	 = Image::findOrFail($id);
		$data['gallery'] = $data['image']->galeria()->firstOrFail();
		$data['album']	 = $data['gallery']->album()->firstOrFail();

		return view('images::images.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{		
		$data['galleries'] = Gallery::all();
		$data['selected'] = $request->input('selected');
		
		$data['image'] = Image::findOrFail($id);

		return view('images::images.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(ImageRequest $request, $id)
	{
		$image = Image::findOrFail($id);

		$image->title = $request->input("title");
		$image->description = $request->input("description");
		$image->gallery_id = $request->input("gallery_id");

		if ($request->hasFile('file')) {
			// TODO: Borrar archivo y todos los thumbs creados
			$file = $request->file;
			$imageFile = ImageI::make($file);

			$imageFile->resize(1280, 1280, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			});	

	  		$path = 'images/uploads/';
			
			$name = time();
			if($image->title){
				$name = $name."-".preg_replace("/[^A-Za-z0-9-_\.]/", "", $image->title);
			}

			$extension = $file->getClientOriginalExtension();

	  		$image->file = $path.$name.".".$extension;
	 
		   	$imageFile->save($image->file);
			
			$imageFile->fit(155,155);

			$image->thumb = $path.$name."-thumb.".$extension;
			$imageFile->save($image->thumb);
		}

		$image->save();

		if($request->input("default_image_id")){
			$galeria = Gallery::find($image->gallery_id);
			$galeria->default_image_id = $image->id;
			$galeria->save();
		} 

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
