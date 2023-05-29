<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Airport;
use App\Models\Airline;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreFlightFinderRequest;
use App\Http\Requests\UpdateFlightFinderRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FlightFinderController extends Controller
{
    // Method to find flights using the web interface
    public function find(UpdateFlightFinderRequest $request) {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'departure_airport' => 'required|string|max:5',
            'arrival_airport' => 'required|string|max:5',
            'departure_date' => 'string|max:10', // Not required
            'arrival_date' => 'string|max:10', // Not required
            'trip_type' => [ Rule::in('one-way', 'round-trip') ] // Will only accept 'round-trip' or 'one-way'
        ]);

        // Input elements from the $request (livewire\search form)
        $departure_airport = $request->departure_airport;
        $arrival_airport = $request->arrival_airport;
        $departure_date = $request->departure_date;
        $arrival_date = $request->arrival_date;
        $trip_type = $request->trip_type;
        
        switch ($trip_type) {
            case 'round-trip':
                $departure_airport_id = Airport::select('id')->where('iata', '=', $departure_airport)->value('id');
                $arrival_airport_id = Airport::select('id')->where('iata', '=', $arrival_airport)->value('id');
                
                if(empty($departure_date) || empty($arrival_date)){
                    $flight_from_to = Flight::join('airlines', 'flights.airline', '=', 'airlines.id')
                            ->select('airlines.iata', 'number', 'departure_airport', 'departure_time', 'arrival_airport', 'arrival_time', 'price')
                            ->where('departure_airport', '=', strval($departure_airport_id))
                            ->where('arrival_airport', '=', strval($arrival_airport_id))
                            ->get();

                    $flight_to_from = Flight::join('airlines', 'flights.airline', '=', 'airlines.id')
                            ->select('airlines.iata', 'number', 'departure_airport', 'departure_time', 'arrival_airport', 'arrival_time', 'price')
                            ->where('departure_airport', '=', strval($arrival_airport_id))
                            ->where('arrival_airport', '=', strval($departure_airport_id))
                            ->get();

                }
                else {
                    $flight_from_to = Flight::join('airlines', 'flights.airline', '=', 'airlines.id')
                            ->select('airlines.iata', 'number', 'departure_airport', 'departure_time', 'arrival_airport', 'arrival_time', 'price')
                            ->where('departure_airport', '=', strval($departure_airport_id))
                            ->where('arrival_airport', '=', strval($arrival_airport_id))
                            ->whereDate('departure_time', '=', $departure_date)
                            ->whereDate('arrival_time', '=', $arrival_date)
                            ->get();

                    $flight_to_from = Flight::join('airlines', 'flights.airline', '=', 'airlines.id')
                            ->select('airlines.iata', 'number', 'departure_airport', 'departure_time', 'arrival_airport', 'arrival_time', 'price')
                            ->where('departure_airport', '=', strval($arrival_airport_id))
                            ->where('arrival_airport', '=', strval($departure_airport_id))
                            ->whereDate('departure_time', '=', $departure_date)
                            ->whereDate('arrival_time', '=', $arrival_date)
                            ->get();
                }

                $flights = $flight_from_to->toBase()->merge($flight_to_from);
                $total_price = $flight_from_to->value('price') + $flight_to_from->value('price');

                $response = $flights;

                return View("livewire/search", compact('response'));

                break;
            case 'one-way':
                $departure_airport_id = Airport::select('id')->where('iata', '=', $departure_airport)->value('id');
                $arrival_airport_id = Airport::select('id')->where('iata', '=', $arrival_airport)->value('id');
                
                if(empty($departure_date) || empty($arrival_date)){
                    $flights = Flight::join('airlines', 'flights.airline', '=', 'airlines.id')
                            ->select('airlines.iata', 'number', 'departure_airport', 'departure_time', 'arrival_airport', 'arrival_time', 'price')
                            ->where('departure_airport', '=', strval($departure_airport_id))
                            ->where('arrival_airport', '=', strval($arrival_airport_id))
                            ->get();
                }
                else {
                    $flights = Flight::join('airlines', 'flights.airline', '=', 'airlines.id')
                            ->select('airlines.iata', 'number', 'departure_airport', 'departure_time', 'arrival_airport', 'arrival_time', 'price')
                            ->where('departure_airport', '=', strval($departure_airport_id))
                            ->where('arrival_airport', '=', strval($arrival_airport_id))
                            ->whereDate('departure_time', '=', $departure_date)
                            ->whereDate('arrival_time', '=', $arrival_date)
                            ->get();
                }

                

                $total_price = $flights->value('price');
                
                $response = $flights;

                return View("livewire/search", compact('response'));
                break;
            default:
                break;
        }

    }

}
