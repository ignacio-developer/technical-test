<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = ['turbine_id', 'notes'];

    public function inspection():belongsTo 
    {
        return $this->belongsTo(Inspection::class); // Each inspection belongs to a turbine
    }

    public function components():belongsToMany 
    {
        return $this->belongsToMany(Component::class, 'inspections_components')->withPivot('grade');
    }

}
