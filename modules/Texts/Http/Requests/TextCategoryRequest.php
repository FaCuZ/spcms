<?php

namespace Modules\Texts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TextCategoryRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|unique:text_categories',
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
			'title' => 'Nombre',
		];
	}
}
