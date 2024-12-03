<?php

namespace App\Repositories\Contracts;

use App\Models\Turbine;

interface TurbineRepositoryInterface
{
    public function getAllTurbines();
    public function getTurbineById($id);
}