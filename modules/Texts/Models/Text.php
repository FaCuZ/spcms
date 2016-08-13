<?php namespace Modules\Texts\Models;

use Illuminate\Database\Eloquent\Model;

use \Venturecraft\Revisionable\Revisionable;

class Text extends Revisionable
{
	protected $fillable = [	'title', 'body'	];
		
	protected $revisionEnabled = true;
	protected $historyLimit = 500; 


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

	/*public static function boot()
	{
		parent::boot();
	}*/

}
