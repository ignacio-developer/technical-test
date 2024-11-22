<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;


class Component extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function turbine(): belongsTo 
    {
        return $this->belongsTo(Turbine::class);
    }

    public function inspections(): belongsToMany
    {
        /*
        return $this->belongsToMany(Inspection::class, 'component_inspection')
                    ->withPivot('grade')
                    ->withTimestamps();
        */
        //return $this->belongsToMany(Inspection::class, 'inspection_components')
        //            ->withPivot('grade');  // Each component can be part of many inspections
        return $this->belongsToMany(Inspection::class, 'inspections_components')
                    ->withPivot('grade')
                    ->withTimestamps();
    }


}
