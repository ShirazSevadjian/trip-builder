<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\AirlineController;
use App\Http\Controllers\Api\V1\AirportController;
use App\Http\Controllers\Api\V1\CityCodesController;
use App\Http\Controllers\Api\V1\CountryCodesController;
use App\Http\Controllers\Api\V1\FlightController;
use App\Http\Controllers\Api\V1\RegionCodesController;
use App\Http\Controllers\Api\V1\TimezonesController;
use App\Http\Controllers\Api\V1\FlightFinderController;

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

    // ---------- Airline ----------
    Route::get('airlines', [AirlineController::class, 'index']); // Show all airlines
    Route::get('airlines/{id}', [AirlineController::class, 'show']); // Show specific airline with ID
    Route::get('airlines/{id}/edit', [AirlineController::class, 'edit']); // Edit specific airline with ID
    Route::put('airlines/{id}/edit', [AirlineController::class, 'update']); // Update specific airline with ID
    Route::delete('airlines/{id}/delete', [AirlineController::class, 'destroy']); // Delete specific airline with ID
    Route::post('airlines', [AirlineController::class, 'store']); // Store or add new airline 
    

    // ---------- Airport ----------
    Route::get('airports', [AirportController::class, 'index']); // Show all airlports
    Route::get('airports/{id}', [AirportController::class, 'show']); // Show specific airport with ID
    Route::get('airports/{id}/edit', [AirportController::class, 'edit']); // Edit specific airport with ID
    Route::put('airports/{id}/edit', [AirportController::class, 'update']); // Update specific airport with ID
    Route::delete('airports/{id}/delete', [AirportController::class, 'destroy']); // Delete specific airport with ID
    Route::post('airports', [AirportController::class, 'store']); // Store or add new airport 
    

    // ---------- CityCode ----------
    Route::get('citycodes', [CityCodesController::class, 'index']); // Show all citycodes
    Route::get('citycodes/{id}', [CityCodesController::class, 'show']); // Show specific citycode with ID
    Route::get('citycodes/{id}/edit', [CityCodesController::class, 'edit']); // Edit specific citycode with ID
    Route::put('citycodes/{id}/edit', [CityCodesController::class, 'update']); // Update specific citycode with ID
    Route::delete('citycodes/{id}/delete', [CityCodesController::class, 'destroy']); // Delete specific citycode with ID
    Route::post('citycodes', [CityCodesController::class, 'store']); // Store or add new citycode 
        

    // ---------- CountryCode ----------
    Route::get('countrycodes', [CountryCodesController::class, 'index']); // Show all countrycodes
    Route::get('countrycodes/{id}', [CountryCodesController::class, 'show']); // Show specific countrycode with ID
    Route::get('countrycodes/{id}/edit', [CountryCodesController::class, 'edit']); // Edit specific countrycode with ID
    Route::put('countrycodes/{id}/edit', [CountryCodesController::class, 'update']); // Update specific countrycode with ID
    Route::delete('countrycodes/{id}/delete', [CountryCodesController::class, 'destroy']); // Delete specific countrycode with ID
    Route::post('countrycodes', [CountryCodesController::class, 'store']); // Store or add new countrycode 
           

    // ---------- Flight ----------
    Route::get('flights', [FlightController::class, 'index']); // Show all flights
    Route::get('flights/{id}', [FlightController::class, 'show']); // Show specific flight with ID
    Route::get('flights/{id}/edit', [FlightController::class, 'edit']); // Edit specific flight with ID
    Route::put('flights/{id}/edit', [FlightController::class, 'update']); // Update specific flight with ID
    Route::delete('flights/{id}/delete', [FlightController::class, 'destroy']); // Delete specific flight with ID
    Route::post('flights', [FlightController::class, 'store']); // Store or add new flight 

      
    // ---------- RegionCode ----------
    Route::get('regioncodes', [RegionCodesController::class, 'index']); // Show all regioncodes
    Route::get('regioncodes/{id}', [RegionCodesController::class, 'show']); // Show specific regioncode with ID
    Route::get('regioncodes/{id}/edit', [RegionCodesController::class, 'edit']); // Edit specific regioncode with ID
    Route::put('regioncodes/{id}/edit', [RegionCodesController::class, 'update']); // Update specific regioncode with ID
    Route::delete('regioncodes/{id}/delete', [RegionCodesController::class, 'destroy']); // Delete specific regioncode with ID
    Route::post('regioncodes', [RegionCodesController::class, 'store']); // Store or add new regioncode 
         

    // ---------- Timezone ----------
    Route::get('timezones', [TimezonesController::class, 'index']); // Show all timezones
    Route::get('timezones/{id}', [TimezonesController::class, 'show']); // Show specific timezone with ID
    Route::get('timezones/{id}/edit', [TimezonesController::class, 'edit']); // Edit specific timezone with ID
    Route::put('timezones/{id}/edit', [TimezonesController::class, 'update']); // Update specific timezone with ID
    Route::delete('timezones/{id}/delete', [TimezonesController::class, 'destroy']); // Delete specific timezone with ID
    Route::post('timezones', [TimezonesController::class, 'store']); // Store or add new timezone 


    // ---------- Find Flight Query ----------
    Route::post('findflight', [FlightFinderController::class, 'findFlight']); // Store or add new timezone



});