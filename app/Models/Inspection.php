<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = ['turbine_id', 'notes'];

    public function turbine():belongsTo 
    {
        return $this->belongsTo(Turbine::class); // Each inspection belongs to a turbine
    }

    public function components() 
    {
        return $this->belongsToMany(Component::class, 'inspections_components')
                    ->withPivot('grade')
                    ->withTimestamps();
    }


}
