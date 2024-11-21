<?php
namespace App\Repositories\Contracts;

use App\Models\Component;

interface ComponentRepositoryInterface
{
    public function createComponent(array $data);
    public function updateComponentGrade($id, array $data);
}