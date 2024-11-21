<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Turbine;

/**
 * Class TurbineRepository.
 */
class TurbineRepository implements TurbineRepositoryInterface
{
    /**
     * @return array
     *  Return the model
     */
    public function all() 
    {
        return Turbine::all();
    }
    
    /**
    * @return array
    *  Return the model
    */
    public function findById($id) 
    {
        return Turbine::findOrFail($id);
    }

    public function store(array $data)
    {
        return Turbine::store($data);
    }

    public function update($id, array $data)
    {
        $turbine = Turbine::findOrFail($id);
        $turbine->update($data);
        return $turbine;
    }

    public function delete($id)
    {
        return Turbine::destroy($id);
    }

}
