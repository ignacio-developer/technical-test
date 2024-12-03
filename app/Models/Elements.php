<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class Element extends Model {

	$guarded = [];
	//$fillable = ['type'];

	public function motor(): belongsTo
	{
		return $this->belongsTo(Motor::class);
	}

}