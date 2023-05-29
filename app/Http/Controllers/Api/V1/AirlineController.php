<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use App\Models\Airline;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($format = 'view')
    {
        $data = Airline::all();

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
    public function store(StoreAirlineRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'iata' => 'required|string|max:3',
            'name' => 'required|string|max:100'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $airline = Airline::create([
                'iata' => $request->iata,
                'name' => $request->name
            ]);
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

    /**
     * Display the specified resource.
     */
    public function show($airline)
    {
        $value = Airline::find($airline);

        if($value){
            return response()->json([
                'status' => 200,
                'airline' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Airline with id ' . $airline . ' was not found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($airline)
    {
        $value = Airline::find($airline);

        if($value){
            return response()->json([
                'status' => 200,
                'airline' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Airline with id ' . $airline . ' was not found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAirlineRequest $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'iata' => 'required|string|max:3',
            'name' => 'required|string|max:100'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $airline = Airline::find($id);

            if($airline){
                $airline->update([
                    'iata' => $request->iata,
                    'name' => $request->name
                ]);

                return response()->json([
                    'status' => 200,
                    'response' => 'Airline successfully updated!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'response' => '[Failed] Airline was not updated.'
                ], 500);
            }
            
        }            
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $airline = Airline::find($id);

        if($airline){

            $airline->delete();

            return response()->json([
                'status' => 200,
                'response' => 'Airline with id ' . $id . ' was successfully deleted.'
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Airline with id ' . $id . ' was not found!'
            ], 404);
        }
    }
}
