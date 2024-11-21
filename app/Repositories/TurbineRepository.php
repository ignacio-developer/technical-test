<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Turbine;
use App\Repositories\Contracts\TurbineRepositoryInterface;


/**
 * Class TurbineRepository.
 */
class TurbineRepository implements TurbineRepositoryInterface
{
    public function getAllTurbines()
    {
        // Retrieve all turbines with their components
        return Turbine::with('components')->get();
    }

    public function getTurbineById($id)
    {
        // Retrieve a turbine by its ID with components
        return Turbine::with('components')->findOrFail($id);
    }
}
