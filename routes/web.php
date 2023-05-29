<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\CityCodesController;
use App\Http\Controllers\CountryCodesController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\RegionCodesController;
use App\Http\Controllers\TimezonesController;
use App\Http\Controllers\FlightFinderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route to display all the data for each controller in the database
Route::get('airlines', [AirlineController::class, 'index']);
Route::get('airports', [AirportController::class, 'index']);
Route::get('citycodes', [CityCodesController::class, 'index']);
Route::get('countrycodes', [CountryCodesController::class, 'index']);
Route::get('flights', [FlightController::class, 'index']);
Route::get('regioncodes', [RegionCodesController::class, 'index']);
Route::get('timezones', [TimezonesController::class, 'index']);


Route::post('findflight', [FlightFinderController::class, 'find'])->name('findflight.find');


Route::get('search', function () {
    return view('livewire/search');
})->name('search');