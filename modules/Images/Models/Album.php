<?php namespace Modules\Images\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

use Modules\Images\Models\Image;

class Album extends Revisionable
{
	use SoftDeletes;
	
	protected $fillable = [ 'title' ];
	protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [ 
		'title' => 'Titulo',
		'deleted_at' => 'Borrado' 
	];

	public function galerias()
	{
		return $this->hasMany('Modules\Images\Models\Gallery');
	}

	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = preg_replace("/[^0-9a-zñ ]/", "", strtolower($value));
	}

	public function scopeAlbum($query, $value)
	{
		$album = $query->get()->keyBy('title')->get(strtolower($value));

		if(!$album) return 'null';

		return $album;
	}

	public function scopeGaleria($query, $album, $galeria)
	{
		// Blade: {{ $albumes->galeria('Diseño', 'Logos') }}
		
		$galeria = $query->album(strtolower($album))->galerias->keyBy('title')->get(strtolower($galeria));

		if(!$galeria) return 'null';

		return $galeria;
	}



	public function scopeImagen($query, $album_value, $galeria_value, $imagen_value)
	{
		// Blade: {{ $albumes->galeria('diseño', 'logos'. 'imagen') }}
		//dd(sinImagen());
		//return sinImagen();

		$album = $query->album(strtolower($album_value));

		if($album == 'null') return sinImagen();

		$galeria = $album->galerias->keyBy('title')->get(strtolower($galeria_value));

		if(!$galeria == 'null') return sinImagen();
		//if($galeria === "null") return strtoupper($album_value."?-".$galeria_value."-".$imagen_value);
		
		$imagen = $galeria->imagenes->keyBy('title')->get(strtolower($imagen_value));

		if(!$imagen == 'null') return sinImagen();

		return $imagen;


	}

}
