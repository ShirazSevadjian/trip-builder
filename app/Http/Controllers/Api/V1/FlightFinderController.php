<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreFlightFinderRequest;
use App\Http\Requests\UpdateFlightFinderRequest;
use App\Models\FlightFinder;
use App\Models\Flight;
use App\Models\Airport;
use App\Models\Airline;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FlightFinderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlightFinderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FlightFinder $flightFinder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlightFinder $flightFinder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlightFinderRequest $request, FlightFinder $flightFinder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlightFinder $flightFinder)
    {
        //
    }


    /**
     * Custom method to query and find flights based on cutomer input
     */
    public function findFlight(UpdateFlightFinderRequest $request) {
        /**
         * --- Expected Input [JSON format]: ---
         * "departure_airport": "YUL",
         * "arrival_airport": "YVR",
         * "departure_date": "2021-02-01",
         * "arrival_date": "2021-02-20",
         * "trip_type": "round-trip"
         */

        $validator = Validator::make($request->all(), [
            'departure_airport' => 'required|string|max:5',
            'arrival_airport' => 'required|string|max:5',
            'departure_date' => 'string|max:10', // Not required
            'arrival_date' => 'string|max:10', // Not required
            'trip_type' => 'required|string|in:one-way,round-trip' // Will only accept 'round-trip' or 'one-way'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            // Search for possible flights matching given input

            switch ($request->trip_type) {
                case 'round-trip':
                    $departure_airport_id = Airport::select('id')->where('iata', '=', $request->departure_airport)->value('id');
                    $arrival_airport_id = Airport::select('id')->where('iata', '=', $request->arrival_airport)->value('id');
                    
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

                    $flights = $flight_from_to->toBase()->merge($flight_to_from);
                    $total_price = $flight_from_to->value('price') + $flight_to_from->value('price');

                    $response = $flights;

                    break;
                case 'one-way':
                    $departure_airport_id = Airport::select('id')->where('iata', '=', $request->departure_airport)->value('id');
                    $arrival_airport_id = Airport::select('id')->where('iata', '=', $request->arrival_airport)->value('id');
                    
                    $flights = Flight::join('airlines', 'flights.airline', '=', 'airlines.id')
                                ->select('airlines.iata', 'number', 'departure_airport', 'departure_time', 'arrival_airport', 'arrival_time', 'price')
                                ->where('departure_airport', '=', strval($departure_airport_id))
                                ->where('arrival_airport', '=', strval($arrival_airport_id))
                                ->get();

                    $total_price = $flights->value('price');
                    
                    $response = $flights;
                    break;
                default:
                    return response()->json([
                        'status' => 500,
                        'response' => '[Failed] Invalid trip_type. Argument must match "round-trip" or "one-way".'
                    ], 500);
                    break;
            }
        }

        if($response){
            return response()->json([
                'status' => 200,
                'flight(s)' => $response,
                'totalPrice' => $total_price
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'response' => 'No Flights were found'
            ], 500);
        }
    }
}
