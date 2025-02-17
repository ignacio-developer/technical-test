<?php

namespace App\Services;

use App\Repositories\Contracts\InspectionRepositoryInterface;

class InspectionService
{
    protected $inspectionRepository;

    public function __construct(InspectionRepositoryInterface $inspectionRepository)
    {
        $this->inspectionRepository = $inspectionRepository;
    }

    public function getAllInspections()
    {
        return $this->inspectionRepository->getAllInspections();
    }

    public function createInspection(array $data)
    {
        return $this->inspectionRepository->createInspection($data);
    }

    public function getInspectionById(int $id)
    {
        return $this->inspectionRepository->getInspectionById($id);
    }
}
