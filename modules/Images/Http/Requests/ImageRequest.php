<?php namespace Modules\Images\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
	public function rules()
	{
		return [
			'title'			=> 'required|unique:images,deleted_at,NULL',
			'description'	=> 'nullable',
			'gallery_id'	=> 'exists:galleries,id',
		];
	}

	public function authorize()
	{
		return true;
	}

	public function attributes()
	{
		return [
			'title'			=> 'Nombre',
			'file'			=> 'Imagen',
			'description'	=> 'Descripcion',
			'gallery_id'	=> 'Galeria',
		];
	}
}
