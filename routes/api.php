<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\AirlineController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Add a prefix to the api route to specify the api version.
// In this case it will be 'api/v1/...'
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {

    // Airline
    Route::get('airlines', [AirlineController::class, 'index']); // Show all airlines
    Route::get('airlines/{id}', [AirlineController::class, 'show']); // Show specific airline with ID
    Route::get('airlines/{id}/edit', [AirlineController::class, 'edit']); // Edit specific airline with ID
    Route::put('airlines/{id}/edit', [AirlineController::class, 'update']); // Update specific airline with ID
    Route::delete('airlines/{id}/delete', [AirlineController::class, 'destroy']); // Delete specific airline with ID
    Route::post('airlines', [AirlineController::class, 'store']); // Store or add new airline 
    
    

});