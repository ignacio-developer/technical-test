<?php

namespace App\Http\Controllers;

use App\Services\MotorService;

class MotorController extends Controller {

	protected $motorService;

	public function __construct(MotorService $motorService) 
	{
		$this->motorService = $motorService;
	}

	public function index()
	{
		return $this->motorService->getAllMotors();
	}

}