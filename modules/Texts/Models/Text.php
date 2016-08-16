<?php namespace Modules\Texts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class Text extends Revisionable
{
	use SoftDeletes;
	
	protected $fillable = [	'title', 'body'	];
	protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [
		'title' => 'Titulo',
		'body' => 'Texto',
		'text_category_id' => 'Categoria',
		'deleted_at' => 'Borrado'

	];


	public function categoria(){
		return $this->belongsTo('Modules\Texts\Models\TextCategory','text_category_id');
	}


	public function scopeTextos($query)
	{
		return $query->get()->keyBy('title');
	}

	public function scopeTexto($query, $value)
	{
		$texto = $query->get()->keyBy('title')->get($value);

		if(!$texto)	return strtoupper($value);

		return $texto->body;
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
