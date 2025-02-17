<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Motor;
use App\Repositories\Contracts\MotorRepositoryInterface;

class MotorRepository implements MotorRepositoryInterface {

	public function getAllMotors()
	{
		return Motor::all(); 
	}

	public function getMotorById($id)
	{
		return Motor::getById($id);
	}
} 