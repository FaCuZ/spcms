<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $fillable = [ 'title', 'description', 'album_id' ];

	public function album(){
		return $this->belongsTo('App\Album');
	}

	public function imagenes(){
		return $this->hasMany('App\Image');
	}


	public function scopeGaleria($query, $value)
	{
		$galeria = $query->get()->keyBy('title')->get($value);

		if(!$galeria) return 'null';

		return $galeria;
	}

}
