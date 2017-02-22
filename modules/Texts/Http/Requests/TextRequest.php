<?php

namespace Modules\Texts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TextRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'				=> 'required',
			'body' 				=> 'required', 
			'text_category_id'	=> 'required',       
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	public function attributes()
	{
		return [
			'title'				=> 'Titulo',
			'body' 				=> 'Texto', 
			'text_category_id'	=> 'Categoria',
		];
	}
}
