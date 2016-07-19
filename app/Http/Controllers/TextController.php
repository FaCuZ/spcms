<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Text;
use Illuminate\Http\Request;

use Auth;

class TextController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$texts = Text::orderBy('id', 'desc')->paginate(10);

		$rol = Auth::user()->role;

		return view('admin.texts.index', compact(['texts','rol']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->role != "admin"){
			return redirect()->route('admin.textos.index');
		} else {
			return view('admin.texts.create');			
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$text = new Text();

		$text->title = $request->input("title");
        $text->body = $request->input("body");

		$text->save();

		return redirect()->route('admin.textos.index')->withErrors(['good' => 'Texto creado correctamente.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$text = Text::findOrFail($id);

		$rol = Auth::user()->role;

		return view('admin.texts.show', compact(['text','rol']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$text = Text::findOrFail($id);

		$rol = Auth::user()->role;

		return view('admin.texts.edit', compact(['text','rol']));
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
		$text = Text::findOrFail($id);

		$text->title = $request->input("title");
        $text->body = $request->input("body");

		$text->save();

		return redirect()->route('admin.textos.index')->withErrors(['good' => 'Texto actualizado correctamente.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$text = Text::findOrFail($id);
		$text->delete();

		return redirect()->route('admin.textos.index')->withErrors(['good' => 'Texto borrado correctamente.']);
	}

}
