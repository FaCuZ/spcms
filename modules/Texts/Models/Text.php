<?php namespace Modules\Texts\Models;


use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
	protected $fillable = [	'title', 'body'	];


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

}