<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	
	protected $fillable = [ 'name', 'email', 'password', 'role' ];

	protected $hidden = [ 'password', 'remember_token' ];

	public function identifiableName(){
		return $this->name;
	}

	public function getIsAdminAttribute($value)
	{
		return ($this->role == 'admin' ? true : false);
	}

	public function getIsNoneAttribute($value)
	{
		return ($this->role == 'none' ? true : false);
	}

}
