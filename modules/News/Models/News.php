<?php namespace Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class News extends Revisionable
{
	use SoftDeletes;
	
	protected $fillable = [	'title', 'body'	];
	protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [
		'title' => 'Titulo',
		'body' => 'Cuerpo',
		'deleted_at' => 'Borrado'

	];


	public function categoria(){
		return $this->belongsTo('Modules\News\Models\NewsCategory','news_category_id');
	}


	public function scopeNoticias($query)
	{
		return $query->get()->keyBy('title');
	}

	public function scopeNoticia($query, $value)
	{
		$noticia = $query->get()->keyBy('title')->get(strtolower($value));

		if(!$noticia)	return strtoupper($value);

		return $noticia->body;
	}


	public function scopeDestacadas($query)
	{
		return $query->where('important', 1);
	}

	public function identifiableName()
	{
		return $this->title;
	}

}
