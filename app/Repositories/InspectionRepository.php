<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Inspection;
use App\Repositories\Contracts\InspectionRepositoryInterface;


/**
 * Class InspectionRepository.
 */
class InspectionRepository implements InspectionRepositoryInterface
{

    public function getAllInspections()
    {
        //return Inspection::all();
        //return Inspection::with('components')->get();
    }

    public function createInspection(array $data)
    {
        // Create a new inspection record
        return Inspection::create($data);
    }
}