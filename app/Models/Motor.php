<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;

class Motor extends Model {

	protected $guarded = [];

	public function elements(): hasMany
	{
		return Elements::class->hasMany;
	}


}