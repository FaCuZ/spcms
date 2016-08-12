<?php namespace Modules\Images\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $fillable = [ 'title', 'description', 'album_id' ];

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
