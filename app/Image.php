<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [ 'title', 'description', 'file', 'thumb', 'gallery_id' ];

    public function gallery(){
		return $this->belongsTo('App\Gallery');
	}
}
