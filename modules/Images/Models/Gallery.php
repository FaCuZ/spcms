<?php namespace Modules\Images\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class Gallery extends Revisionable
{
    use SoftDeletes;
	
	protected $fillable = [ 'title', 'description', 'default_image_id', 'album_id' ];
    protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [
		'title' => 'Titulo',
		'description' => 'Descripcion',
		'deleted_at' => 'Borrado'
	];

	public function album(){
		return $this->belongsTo('Modules\Images\Models\Album');
	}

	public function imagenes(){
		return $this->hasMany('Modules\Images\Models\Image');
	}

	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = preg_replace("/[^0-9a-zñ ]/", "", strtolower($value));
	}

	public function scopeGaleria($query, $value)
	{
		$galeria = $query->get()->keyBy('title')->get(strtolower($value));

		if(!$galeria) return 'null';

		return $galeria;
	}

	public function getVistaAttribute()
	{
		// TODO: Preguntar si tiene una imagen para mostrar por default
		return $this->imagenes->first()["thumb"];
	}

}
