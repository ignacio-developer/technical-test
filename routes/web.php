<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\TurbineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('app'); // Render the main React app (app.blade.php)
});
*/

// Catch-all route for any React routing (like /turbines or /inspections)
Route::get('/{any}', function () {
    return view('app'); // React app will take care of the routing here
})->where('any', '.*');

//Route::get('/inspections', [InspectionController::class, 'index']);
//Route::view('/inspections', 'inspections');
//Route::view('/turbines', 'turbines');

//Route::get('/turbines', [TurbineController::class, 'index']);

