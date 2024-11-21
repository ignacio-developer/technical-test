<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Component;

/**
 * Class ComponentRepository.
 */
class ComponentRepository implements ComponentRepositoryInterface
{
    /**
     * @return array
     *  Return the model
     */
    public function all() 
    {
        return Component::all();
    }
    
    /**
    * @return array
    *  Return the model
    */
    public function findById($id) 
    {
        return Component::findOrFail($id);
    }

    public function store(array $data)
    {
        return Component::store($data);
    }

    public function update($id, array $data)
    {
        $component = Component::findOrFail($id);
        $component->update($data);
        return $component;
    }

    public function delete($id)
    {
        return Component::destroy($id);
    }

}
