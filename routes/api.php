<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurbineController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Turbine Routes
Route::get('/turbines', [TurbineController::class, 'index']); // Fetch all turbines with their components
Route::get('/turbines/{id}', [TurbineController::class, 'show']); // Fetch a specific turbine with components

// Component Routes
Route::post('/components', [ComponentController::class, 'store']); // Create a new component
Route::put('/components/{id}', [ComponentController::class, 'update']); // Update an existing component

// Inspection Routes
Route::get('/inspections/{id}', [InspectionController::class, 'edit']); // Edit an existing inspection
Route::get('/inspections', [InspectionController::class, 'index']); // View the inspections for turbines
Route::post('/inspections', [InspectionController::class, 'store']); // Create a new inspection for a turbine
Route::get('/reports', [ReportController::class, 'index']); // Fetch all reports.

// Example for authentication routes (if needed in the future)
// Route::post('/login', [AuthController::class, 'login']); // For login
// Route::post('/register', [AuthController::class, 'register']); // For user registration
