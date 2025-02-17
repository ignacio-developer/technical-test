<?php

namespace App\Services;

use App\Repositories\Contracts\MotorRepositoryInterface;

class MotorService {

	protected $motorRepository;

	public function __construct(MotorRepositoryInterface $motorRepository)
	{
		$this->motorRepository = $motorRepository;
	}

	public function getAllMotors() 
	{
		return $this->motorRepository->getAllMotors();
	}

	public function getMotorById($id) 
	{	
		return "Motor";
	}

}