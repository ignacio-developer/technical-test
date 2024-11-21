<?php

namespace App\Http\Controllers;

use App\Services\TurbineService;

class TurbineController extends Controller
{
    protected $turbineService;

    public function __construct(TurbineService $turbineService)
    {
        $this->turbineService = $turbineService;
    }

    public function index()
    {
        $turbines = $this->turbineService->getAllTurbines();
        return response()->json($turbines);
    }

    public function show($id)
    {
        $turbine = $this->turbineService->getTurbineById($id);
        return response()->json($turbine);
    }
}
