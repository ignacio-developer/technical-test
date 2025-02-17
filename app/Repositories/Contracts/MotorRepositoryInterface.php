<?php

namespace App\Repositories\Contracts;

use App\Models\Motor;

interface MotorRepositoryInterface 
{
	public function getAllMotors();
	public function getMotorById($id);
}