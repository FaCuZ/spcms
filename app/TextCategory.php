<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextCategory extends Model
{
	protected $fillable = [ 'title' ];

	public function textos()
	{
		return $this->hasMany('App\Text');
	}

	public function scopeCategoria($query, $value)
	{
		$categoria = $query->get()->keyBy('title')->get($value);

		if(!$categoria) return 'null';

		return $categoria;
	}

	public function scopeTexto($query, $cat_value, $txt_value)
	{
		// Blade: {{ $categorias->texto('Diseño', 'Logos') }}
		
		$categoria = $query->categoria($cat_value);

		if($categoria === "null") return strtoupper($cat_value."?-".$txt_value);

		$texto = $categoria->textos->keyBy('title')->get($txt_value);

		if(!$texto) return strtoupper($cat_value."-".$txt_value."?");

		return $texto->body;
	}
}
