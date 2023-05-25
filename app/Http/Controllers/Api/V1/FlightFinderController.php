<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlightFinderRequest;
use App\Http\Requests\UpdateFlightFinderRequest;
use App\Models\FlightFinder;
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
            'trip_type' => 'string|max:30' // Will only accept 'round-trip' or 'one-way'
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
                    $response = DB::table('flights')
                                ->join('airlines', 'flights.airline', '=', 'airlines.id')
                                ->join('airports', 'flights.departure_airport', '=', 'airports.id')
                                ->join('airports', 'flights.arrival_airport', '=', 'airports.id')
                                ->select()
                                ->get();

                    break;
                case 'one-way':
                    # code...
                    break;
                default:
                    return response()->json([
                        'status' => 500,
                        'response' => '[Failed] Invalid trip_type. Argument must match "round-trip" or "one-way".'
                    ], 500);
                    break;
            }
        }

        if($airline){
            return response()->json([
                'status' => 200,
                'response' => 'Airline successfully added!'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'response' => '[Failed] Airline was not added.'
            ], 500);
        }
    }
}