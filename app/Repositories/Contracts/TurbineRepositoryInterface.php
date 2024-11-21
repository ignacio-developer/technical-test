<?php

/*
namespace App\Repositories\Contracts;

interface TurbineRepositoryInterface {

	public function all();
    public function findById($id);
	public function store(array $data);
	public function update($id, array $data);
	public function delete($id);
	
}

*/

namespace App\Repositories\Contracts;

use App\Models\Turbine;

interface TurbineRepositoryInterface
{
    public function getAllTurbines();
    public function getTurbineById($id);
}