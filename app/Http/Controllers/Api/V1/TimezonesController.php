<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoretimezonesRequest;
use App\Http\Requests\UpdatetimezonesRequest;
use App\Models\timezones;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TimezonesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Timezone::all();

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
    public function store(StoretimezonesRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'offset' => 'required|int|max:5'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $region_codes = RegionCode::create([
                'name' => $request->name,
                'offset' => $request->offset
            ]);
        }

        if($region_codes){
            return response()->json([
                'status' => 200,
                'response' => 'Timezone successfully added!'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'response' => '[Failed] Timezone was not added.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(timezones $timezones)
    {
        $value = Timezone::find($timezones);

        if($value){
            return response()->json([
                'status' => 200,
                'timezone' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Timezone with id ' . $timezones . ' was not found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($timezones)
    {
        $value = Timezone::find($timezones);

        if($value){
            return response()->json([
                'status' => 200,
                'timezone' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Timezone with id ' . $timezones . ' was not found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetimezonesRequest $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'offset' => 'required|int|max:5'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $timezone = Timezone::find($id);

            if($timezone){
                $timezone->update([
                    'name' => $request->name,
                    'offset' => $request->offset
                ]);

                return response()->json([
                    'status' => 200,
                    'response' => 'Timezone successfully updated!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'response' => '[Failed] Timezone was not updated.'
                ], 500);
            }
            
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $timezone = Timezone::find($id);

        if($timezone){

            $timezone->delete();

            return response()->json([
                'status' => 200,
                'response' => 'Timezone with id ' . $id . ' was successfully deleted.'
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Timezone with id ' . $id . ' was not found!'
            ], 404);
        }
    }
}