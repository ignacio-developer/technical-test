<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ComponentService;

class ComponentController extends Controller
{
    protected $componentService;

    public function __construct(ComponentService $componentService)
    {
        $this->componentService = $componentService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'turbine_id' => 'required|exists:turbines,id',
            'name' => 'required|string',
            'grade' => 'required|integer|min:1|max:5',
        ]);

        $component = $this->componentService->createComponent($validated);
        return response()->json($component, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'grade' => 'required|integer|min:1|max:5',
        ]);

        $component = $this->componentService->updateComponentGrade($id, $validated);
        return response()->json($component);
    }
}