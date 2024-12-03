<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turbine;
use App\Models\Component;
use App\Models\Inspection;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ["turbines", "components", "inspections"];

/*
    public function turbines() 
    {
        $this->hasMany(Turbine::class);
    }

    public function components() 
    {
        $this->hasMany(Component::class);
    }

    public function inspections() 
    {
        $this->hasMany(Inspection::class);
    }
*/
}
