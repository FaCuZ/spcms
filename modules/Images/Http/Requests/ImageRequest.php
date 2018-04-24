<?php namespace Modules\Images\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
	public function rules()
	{
		return [
			'title'			=> 'nullable|unique:images,deleted_at,NULL',
			'description'	=> 'nullable',
			'gallery_id'	=> 'exists:galleries,id',
			'default_image_id'	=> 'nullable',
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
			'default_image_id'	=> 'Portada',
		];
	}
}
