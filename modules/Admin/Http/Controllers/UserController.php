<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\User;

use Hash;

class UserController extends Controller
{

	public function updateUsuario(Request $request){
}

	
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{
		$data['usuarios'] = User::all();

		return view('admin::user.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create()
	{
		return view('admin::user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  Request $request
	 * @return Response
	 */
	public function store(Request $request){
        $request->merge(['password' => Hash::make($request->password)]);
        
        $user = User::create($request->all());

		return redirect()->route('admin.usuarios')->withErrors(['good' => 'El usuario se creo correctamente.']);

	}

	/**
	 * Show the form for editing the specified resource.
	 * @return Response
	 */
	public function edit($id) {
		$data['usuario'] = User::find($id);

		return view('admin::user.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 * @param  Request $request
	 * @return Response
	 */
	public function update(Request $request, $id) {

		$user = User::findOrFail($id);

		$user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->role = $request->input("role");

        $user->save();

		return redirect()->route('admin.usuarios')->withErrors(['good' => 'El usuario se modifico correctamente.']);
	
	}

	public function show($id){
		$data['usuario'] = User::find($id);

		return view('admin::user.edit', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		
		return redirect()->route('admin.usuarios')->withErrors(['good' => 'El usuario se borrado correctamente.']);
	}
}
