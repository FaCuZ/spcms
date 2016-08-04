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

	public function scopeTexto($query, $categoria, $texto)
	{
		// Blade: {{ $categorias->texto('Diseño', 'Logos') }}
		
		$texto = $query->categoria($categoria)->textos->keyBy('title')->get($texto);

		if(!$texto)	return strtoupper($value);

		return $texto->body;
	}
}
