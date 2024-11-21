<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = ['turbine_id', 'name'];

    public function turbine():belongsTo 
    {
        return $this->belongsTo(Turbine::class);
    }

    public function inspections()
    {
        return $this->belongsToMany(Inspection::class, 'inspection_components')
                    ->withPivot('grade');  // Each component can be part of many inspections
    }


}
