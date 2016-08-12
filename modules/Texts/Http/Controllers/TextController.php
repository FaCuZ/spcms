<?php namespace Modules\Texts\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Modules\Texts\Models\TextCategory;
use Modules\Texts\Models\Text;

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
		$data['texts'] = Text::all();

		$data['text_categories'] = TextCategory::all();

		return view('texts::index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

		$data['selected'] = $request->input('selected');

		$data['text_categories'] = TextCategory::all();

		return view('texts::create', $data);
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
        $text->text_category_id = $request->input("text_category_id");

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
		$data['text'] = Text::findOrFail($id);
		$data['text_category'] = TextCategory::find($data['text']->text_category_id);

		return view('texts::show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['text'] = Text::findOrFail($id);
		
		$data['selected'] = $data['text']->text_category_id;

		$data['text_categories'] = TextCategory::all();

		return view('texts::edit', $data);
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
        $text->text_category_id = $request->input("text_category_id");

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
