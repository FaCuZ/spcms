<?php namespace Modules\Links\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
			'url' 				=> 'required', 
			'link_category_id'	=> 'required',       
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
			'url' 				=> 'Link', 
			'link_category_id'	=> 'Categoria',
		];
	}
}
