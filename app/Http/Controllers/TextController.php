<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Text;
use Illuminate\Http\Request;

class TextController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$texts = Text::orderBy('id', 'desc')->paginate(10);

		return view('texts.index', compact('texts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('texts.create');
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

		return redirect()->route('texts.index')->with('message', 'Item created successfully.');
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

		return view('texts.show', compact('text'));
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

		return view('texts.edit', compact('text'));
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

		return redirect()->route('texts.index')->with('message', 'Item updated successfully.');
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

		return redirect()->route('texts.index')->with('message', 'Item deleted successfully.');
	}

}
