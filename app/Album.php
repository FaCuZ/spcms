<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	protected $fillable = [ 'title' ];

	public function galerias(){
		return $this->hasMany('App\Gallery');
		//return $this->hasMany('App\Gallery', 'album_id');
	}
}
