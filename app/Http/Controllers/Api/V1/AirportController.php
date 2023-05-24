<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreAirportRequest;
use App\Http\Requests\UpdateAirportRequest;
use App\Models\Airport;
use App\Http\Controllers\Controller;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Airport::all();

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
    public function store(StoreAirportRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'iata' => 'required|string|max:3',
            'name' => 'required|string|max:100',
            'city_code' => 'required|string|max:5',
            'country_code' => 'required|string|max:5',
            'region_code' => 'required|string|max:5',
            'latitude' => 'required|decimal:2,6',
            'longitude' => 'required|decimal:2,6',
            'timezone' => 'required|int'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $airport = Airport::create([
                'iata' => $request->iata,
                'name' => $request->name,
                'city_code' => $request->city_code,
                'country_code' => $request->country_code,
                'region_code' => $request->region_code,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'timezone' => $request->timezone
            ]);
        }

        if($airline){
            return response()->json([
                'status' => 200,
                'response' => 'Airport successfully added!'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'response' => '[Failed] Airport was not added.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($airport)
    {
        $value = Airport::find($airport);

        if($value){
            return response()->json([
                'status' => 200,
                'airline' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Airport with id ' . $airport . ' was not found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($airport)
    {
        $value = Airport::find($airport);

        if($value){
            return response()->json([
                'status' => 200,
                'airline' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Airport with id ' . $airport . ' was not found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAirportRequest $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'iata' => 'required|string|max:3',
            'name' => 'required|string|max:100',
            'city_code' => 'required|string|max:5',
            'country_code' => 'required|string|max:5',
            'region_code' => 'required|string|max:5',
            'latitude' => 'required|decimal:2,6',
            'longitude' => 'required|decimal:2,6',
            'timezone' => 'required|int'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $airport = Airport::find($id);

            if($airport){
                $airport->update([
                    'iata' => $request->iata,
                    'name' => $request->name,
                    'city_code' => $request->city_code,
                    'country_code' => $request->country_code,
                    'region_code' => $request->region_code,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'timezone' => $request->timezone
                ]);

                return response()->json([
                    'status' => 200,
                    'response' => 'Airport successfully updated!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'response' => '[Failed] Airport was not updated.'
                ], 500);
            }
            
        }          
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $airport = Airport::find($id);

        if($airport){

            $airport->delete();

            return response()->json([
                'status' => 200,
                'response' => 'Airport with id ' . $id . ' was successfully deleted.'
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Airport with id ' . $id . ' was not found!'
            ], 404);
        }
    }
}
