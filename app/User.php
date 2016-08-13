<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $fillable = [ 'name', 'email', 'password', 'role' ];

	protected $hidden = [ 'password', 'remember_token' ];

	public function identifiableName(){
		return $this->name;
	}
}
