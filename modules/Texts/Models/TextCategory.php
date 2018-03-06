<?php namespace Modules\Texts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class TextCategory extends Revisionable
{
    use SoftDeletes;
	
	protected $fillable = [ 'title' ];
    protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [ 
		'title' => 'Titulo',
		'deleted_at' => 'Borrado'
	];

	public function textos()
	{
		return $this->hasMany('Modules\Texts\Models\Text');
	}

	public function scopeCategoria($query, $value)
	{
		$categoria = $query->get()->keyBy('title')->get(strtolower($value));

		if(!$categoria) return 'null';

		return $categoria;
	}

	public function scopeTexto($query, $cat_value, $txt_value)
	{
		// Blade: {{ $textos->texto('Diseño', 'Logos') }}

		$categoria = $query->categoria(strtolower($cat_value));

		if($categoria === "null") return strtoupper($cat_value."?-".$txt_value);

		$texto = $categoria->textos->keyBy('title')->get(strtolower($txt_value));

		if(!$texto) return strtoupper($cat_value."-".$txt_value."?");

		return $texto->body;
	}

	public function scopeLista($query, $cat_value)
	{
		// Blade: {{ $categorias->lista('Diseño') }}
		
		$categoria = $query->categoria(strtolower($cat_value));

		if($categoria === "null") return strtoupper($cat_value."?");

		return $categoria->textos->keyBy('title');
	}


	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = preg_replace("/[^0-9a-zñ ]/", "", strtolower($value));
	}

	public function identifiableName()
	{
		return $this->title;
	}
}
