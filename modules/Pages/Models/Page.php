<?php namespace Modules\Pages\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class Page extends Revisionable
{
	public $table = "pages";

	use SoftDeletes;
	
	protected $fillable = [	'title', 'path', 'order', 'active', 'editable'];
	protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	protected $revisionFormattedFieldNames = [
		'title' => 'Nombre',
		'path' => 'Ruta',
		'order' => 'Orden',
		'active' => 'Activo'
	];

	public function identifiableName()
	{
		return $this->question;
	}

}
