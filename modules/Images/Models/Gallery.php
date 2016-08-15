<?php namespace Modules\Images\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class Gallery extends Revisionable
{
    use SoftDeletes;
	
	protected $fillable = [ 'title', 'description', 'album_id' ];
    protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [
		'title' => 'Titulo',
		'description' => 'Descripcion'
	];

	public function album(){
		return $this->belongsTo('Modules\Images\Models\Album');
	}

	public function imagenes(){
		return $this->hasMany('Modules\Images\Models\Image');
	}


	public function scopeGaleria($query, $value)
	{
		$galeria = $query->get()->keyBy('title')->get($value);

		if(!$galeria) return 'null';

		return $galeria;
	}

}
