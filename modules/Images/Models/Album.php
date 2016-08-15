<?php namespace Modules\Images\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class Album extends Revisionable
{
    use SoftDeletes;
	
	protected $fillable = [ 'title' ];
    protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [ 'title' => 'Titulo' ];

	public function galerias()
	{
		return $this->hasMany('Modules\Images\Models\Gallery');
	}

	public function scopeAlbum($query, $value)
	{
		$album = $query->get()->keyBy('title')->get($value);

		if(!$album) return 'null';

		return $album;
	}

	public function scopeGaleria($query, $album, $galeria)
	{
		// Blade: {{ $albumes->galeria('Diseño', 'Logos') }}
		
		$galeria = $query->album($album)->galerias->keyBy('title')->get($galeria);

		if(!$galeria) return 'null';

		return $galeria;
	}

}
