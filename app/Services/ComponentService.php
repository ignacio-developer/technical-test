<?php

namespace App\Services;

use App\Repositories\Contracts\ComponentRepositoryInterface;

class ComponentService
{
    protected $componentRepository;

    public function __construct(ComponentRepositoryInterface $componentRepository)
    {
        $this->componentRepository = $componentRepository;
    }

    public function createComponent(array $data)
    {
        return $this->componentRepository->createComponent($data);
    }

    public function updateComponentGrade($id, array $data)
    {
        return $this->componentRepository->updateComponentGrade($id, $data);
    }
}
