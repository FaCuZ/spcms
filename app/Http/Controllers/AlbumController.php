<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album;
use Illuminate\Http\Request;

use Auth;

class AlbumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$albums = Album::orderBy('id', 'desc')->paginate(10);

		$rol = Auth::user()->role;

		return view('admin.albums.index', compact(['albums','rol']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.albums.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$album = new Album();

		$album->title = $request->input("title");

		$album->save();

		return redirect()->route('admin.albums.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$album = Album::findOrFail($id);

		$rol = Auth::user()->role;

		return view('admin.albums.show', compact(['album','rol']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$album = Album::findOrFail($id);

		$rol = Auth::user()->role;
		
		return view('admin.albums.edit', compact(['album','rol']));
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
		$album = Album::findOrFail($id);

		$album->title = $request->input("title");

		$album->save();

		return redirect()->route('admin.albums.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$album = Album::findOrFail($id);
		$album->delete();

		return redirect()->route('admin.albums.index')->with('message', 'Item deleted successfully.');
	}

}
