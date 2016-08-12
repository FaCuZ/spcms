<?php namespace Modules\Images\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [ 'title', 'description', 'file', 'thumb', 'gallery_id' ];

	public function galeria(){
		return $this->belongsTo('Modules\Images\Models\Gallery');
	}


	public function getUrlAttribute()
	{
		return asset($this->file);
	

	}

	public function getUrlThumbAttribute()
	{
		return asset($this->thumb);
	}


	public function scopeTodas($query, $album, $galeria)
	{
		return $query->get()->keyBy('title');
	}


	public function scopeImagen($query, $value)
	{
		$imagen = $query->get()->keyBy('title')->get($value);

		if(!$imagen) $imagen = $query->get()->keyBy('title')->get('Sin imagen');

		return $imagen;
	}

}
