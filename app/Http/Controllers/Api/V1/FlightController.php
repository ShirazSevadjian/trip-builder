<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreFlightRequest;
use App\Http\Requests\UpdateFlightRequest;
use App\Models\Flight;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Flight::all();

        if($data->count() > 0){
            return response()->json([
                $data
            ], 200);
        }
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
    public function store(StoreFlightRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'airline' => 'required|int',
            'number' => 'required|string|max:10',
            'departure_airport' => 'required|int',
            'departure_time' => 'required|string|max:5',
            'arrival_airport' => 'required|int',
            'arrival_time' => 'required|string|max:5',
            'price' => 'required|decimal'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $flight = Flight::create([
                'airline' => $request->airline,
                'number' => $request->number,
                'departure_airport' => $request->departure_airport,
                'departure_time' => $request->departure_time,
                'arrival_airport' => $request->arrival_airport,
                'arrival_time' => $request->arrival_time,
                'price' => $request->price
            ]);
        }

        if($flight){
            return response()->json([
                'status' => 200,
                'response' => 'Flight successfully added!'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'response' => '[Failed] Flight was not added.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($flight)
    {
        $value = Flight::find($flight);

        if($value){
            return response()->json([
                'status' => 200,
                'flight' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Flight with id ' . $country_codes . ' was not found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($flight)
    {
        $value = Flight::find($flight);

        if($value){
            return response()->json([
                'status' => 200,
                'flight' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Flight with id ' . $flight . ' was not found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlightRequest $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'airline' => 'required|int',
            'number' => 'required|string|max:10',
            'departure_airport' => 'required|int',
            'departure_time' => 'required|string|max:5',
            'arrival_airport' => 'required|int',
            'arrival_time' => 'required|string|max:5',
            'price' => 'required|decimal'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $flight = Flight::find($id);

            if($flight){
                $flight->update([
                    'airline' => $request->airline,
                    'number' => $request->number,
                    'departure_airport' => $request->departure_airport,
                    'departure_time' => $request->departure_time,
                    'arrival_airport' => $request->arrival_airport,
                    'arrival_time' => $request->arrival_time,
                    'price' => $request->price
                ]);

                return response()->json([
                    'status' => 200,
                    'response' => 'Flight successfully updated!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'response' => '[Failed] Flight was not updated.'
                ], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $flight = Flight::find($id);

        if($flight){

            $flight->delete();

            return response()->json([
                'status' => 200,
                'response' => 'Flight with id ' . $id . ' was successfully deleted.'
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Flight with id ' . $id . ' was not found!'
            ], 404);
        }
    }
}
