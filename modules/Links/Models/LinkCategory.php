<?php namespace Modules\Links\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class LinkCategory extends Revisionable
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

	public function links()
	{
		return $this->hasMany('Modules\Links\Models\Link');
	}

	public function scopeCategoria($query, $value)
	{
		$categoria = $query->get()->keyBy('title')->get(strtolower($value));

		if(!$categoria) return 'null';

		return $categoria;
	}

	public function scopeLink($query, $cat_value, $txt_value)
	{
		// Blade: {{ $categorias->link('Diseño', 'Logos') }}
		
		$categoria = $query->categoria(strtolower($cat_value));

		if($categoria === "null") return strtoupper($cat_value."?-".$txt_value);

		$link = $categoria->links->keyBy('title')->get(strtolower($txt_value));

		if(!$link) return strtoupper($cat_value."-".$txt_value."?");

		return $link->body;
	}

	public function scopeLista($query, $cat_value)
	{
		// Blade: {{ $categorias->lista('Diseño') }}
		
		$categoria = $query->categoria(strtolower($cat_value));

		if($categoria === "null") return strtoupper($cat_value."?");

		return $categoria->links->keyBy('title');
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
