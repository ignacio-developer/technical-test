<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurbineController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\InspectionController;

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
Route::get('/inspections', [InspectionController::class, 'index']); // Create a new inspection for a turbine
Route::post('/inspections', [InspectionController::class, 'store']); // Create a new inspection for a turbine

// Example for authentication routes (if needed in the future)
// Route::post('/login', [AuthController::class, 'login']); // For login
// Route::post('/register', [AuthController::class, 'register']); // For user registration
