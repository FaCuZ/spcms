<?php namespace Modules\Images\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
	public function rules()
	{
		return [
			'title' 			=> 'required|unique:galleries,deleted_at,NULL',
			'description' 		=> 'nullable',
			'default_image_id' 	=> 'nullable',
			'album_id' 			=> 'exists:albums,id',
		];
	}

	public function authorize()
	{
		return true;
	}

	public function attributes()
	{
		return [
			'title' 			=> 'Nombre',
			'description' 		=> 'Descripcion',
			'default_image_id' 	=> 'Imagen por defecto',
			'album_id' 			=> 'Album',
		];
	}
}
