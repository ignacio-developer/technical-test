<?php

namespace App\Http\Controllers;

use App\Services\InspectionService;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    protected $inspectionService;

    public function __construct(InspectionService $inspectionService)
    {
        $this->inspectionService = $inspectionService;
    }

    /*
    public function index(): JsonResponse
    {
        return response()->json(Inspection::with('turbine')->get());
    }
    */
    public function index() 
    {
        return $this->inspectionService->getAllInspections();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'turbine_id' => 'required|exists:turbines,id',
            'inspection_date' => 'required|date',
        ]);

        $inspection = $this->inspectionService->createInspection($validated);
        return response()->json($inspection, 201);
    }
}
