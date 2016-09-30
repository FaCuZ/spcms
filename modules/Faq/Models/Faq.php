<?php namespace Modules\Faq\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class Faq extends Revisionable
{
	public $table = "faq";

	use SoftDeletes;
	
	protected $fillable = [	'answer', 'question' ];
	protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [
		'answer' => 'Respuesta',
		'question' => 'Pregunta',
		'faq_category_id' => 'Categoria',
		'deleted_at' => 'Borrado'

	];

	public function categoria(){
		return $this->belongsTo('Modules\Faq\Models\FaqCategory','faq_category_id');
	}

/*
	public function scopeTextos($query)
	{
		return $query->get()->keyBy('title');
	}

	public function scopeTexto($query, $value)
	{
		$texto = $query->get()->keyBy('title')->get(strtolower($value));

		if(!$texto)	return strtoupper($value);

		return $texto->body;
	}


	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = preg_replace("/[^0-9a-zñ ]/", "", strtolower($value));
	}
*/
	public function identifiableName()
	{
		return $this->question;
	}

}
