<?php namespace Modules\Faq\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class FaqCategory extends Revisionable
{
	public $table = "faq_categories";
	
    use SoftDeletes;
	
	protected $fillable = [ 'title' ];
    protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [ 
		'title' => 'Nombre',
		'deleted_at' => 'Borrado'
	];

	public function faq()
	{
		return $this->hasMany('Modules\Faq\Models\Faq');
	}
/*
	public function scopeCategoria($query, $value)
	{
		$categoria = $query->get()->keyBy('title')->get(strtolower($value));

		if(!$categoria) return 'null';

		return $categoria;
	}

	public function scopeTexto($query, $cat_value, $txt_value)
	{
		// Blade: {{ $categorias->texto('Diseño', 'Logos') }}
		
		$categoria = $query->categoria(strtolower($cat_value));

		if($categoria === "null") return strtoupper($cat_value."?-".$txt_value);

		$texto = $categoria->textos->keyBy('title')->get(strtolower($txt_value));

		if(!$texto) return strtoupper($cat_value."-".$txt_value."?");

		return $texto->body;
	}

	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = preg_replace("/[^0-9a-zñ ]/", "", strtolower($value));
	}*/

	public function identifiableName()
	{
		return $this->title;
	}
}
