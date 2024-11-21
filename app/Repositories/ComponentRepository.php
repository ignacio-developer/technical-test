<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Component;
use App\Repositories\Contracts\ComponentRepositoryInterface;

/**
 * Class ComponentRepository.
 */
class ComponentRepository implements ComponentRepositoryInterface
{
    public function createComponent(array $data)
    {
        // Create a new component
        return Component::create($data);
    }

    public function updateComponentGrade($id, array $data)
    {
        // Find the component and update its grade
        $component = Component::findOrFail($id);
        $component->update($data);

        return $component;
    }
}
