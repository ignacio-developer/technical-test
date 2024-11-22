<?php

namespace App\Services;

use App\Repositories\Contracts\TurbineRepositoryInterface;

class TurbineService
{
    protected $turbineRepository;

    public function __construct(TurbineRepositoryInterface $turbineRepository)
    {
        $this->turbineRepository = $turbineRepository;
    }

    public function getAllTurbines()
    {
        return $this->turbineRepository->getAllTurbines();
    }

    public function getTurbineById($id)
    {
        return $this->turbineRepository->getTurbineById($id);
    }
}
