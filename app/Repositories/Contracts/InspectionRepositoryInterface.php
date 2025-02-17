<?php

namespace App\Repositories\Contracts;

use App\Models\Inspection;

interface InspectionRepositoryInterface
{
    public function getAllInspections();
    public function createInspection(array $data);
    public function getInspectionById(int $id);
}