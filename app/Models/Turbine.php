<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turbine extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function components():hasMany 
    {
        return $this->hasMany(Component::class);
    }

    public function inspections():hasMany
    {
        return $this->hasMany(Inspection::class);
    }

    //$fillable = ['name'];

}
