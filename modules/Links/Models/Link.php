<?php namespace Modules\Links\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class Link extends Revisionable
{
	use SoftDeletes;
	
	protected $fillable = [	'title', 'url'	];
	protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [
		'title' => 'Titulo',
		'url' => 'Link',
		'link_category_id' => 'Categoria',
		'deleted_at' => 'Borrado'

	];


	public function categoria(){
		return $this->belongsTo('Modules\Links\Models\LinkCategory','link_category_id');
	}


	public function scopeLinks($query)
	{
		return $query->get()->keyBy('title');
	}

	public function scopeLink($query, $value)
	{
		$link = $query->get()->keyBy('title')->get(strtolower($value));

		if(!$link)	return strtoupper($value);

		return $link->url;
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
