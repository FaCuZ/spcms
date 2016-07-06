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
}
