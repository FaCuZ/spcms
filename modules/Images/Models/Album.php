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
		// Blade: {{ $albumes->imagen('diseño', 'logos'. 'imagen') }}

		$album = $query->album(strtolower($album_value));

		if($album == 'null') return sinImagen();

		$galeria = $album->galerias->keyBy('title')->get(strtolower($galeria_value));

		if(!$galeria == 'null') return sinImagen();
		
		$imagen = $galeria->imagenes->keyBy('title')->get(strtolower($imagen_value));

		if(!$imagen == 'null') return sinImagen();

		return $imagen;

	}


	public function scopeThumpSize($query, $album_value, $galeria_value, $imagen_value, $size)
	{
		// TODO: test
		// Blade: {{ $albumes->imagen('diseño', 'logos'. 'imagen', '300x300') }}

		$album = $query->album(strtolower($album_value));

		if($album == 'null') return sinImagen();

		$galeria = $album->galerias->keyBy('title')->get(strtolower($galeria_value));

		if(!$galeria == 'null') return sinImagen();
		
		$imagen = $galeria->imagenes->keyBy('title')->get(strtolower($imagen_value));

		if(!$imagen == 'null') return sinImagen();

		return imageThumbSize($imagen, $size);
	}


	public function scopeCovers($query, $album_value)
	{
		// Blade: {{ $albumes->covers('Diseño') }}

		$album = $query->album(strtolower($album_value));

		if($album == 'null') return sinImagen();

		$covers = [];

		foreach ($album->galerias as $key => $galeria) {
			$imagen = Image::find($galeria->default_image_id);

			if($imagen != null){
               	$covers[$key] = $imagen;
			} 

		}

		return $covers;
	}

}
