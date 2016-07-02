<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $fillable = [ 'title', 'description', 'album_id' ];

	public function album(){
		return $this->belongsTo('Album');
	}

	public function imagenes(){
		return $this->hasMany('Image');
	}
}
