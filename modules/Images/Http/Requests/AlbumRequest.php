<?php namespace Modules\Images\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
	public function rules()
	{
		return [
			'title' => 'required|unique:albums',
		];
	}

	public function authorize()
	{
		return true;
	}

	public function attributes()
	{
		return [
			'title' => 'Nombre',
		];
	}
}
