<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Storecity_codesRequest;
use App\Http\Requests\Updatecity_codesRequest;
use App\Models\city_codes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CityCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CityCode::all();

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
    public function store(Storecity_codesRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:3',
            'city_name' => 'required|string|max:100'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $city_codes = CityCode::create([
                'code' => $request->code,
                'city_name' => $request->city_name
            ]);
        }

        if($city_codes){
            return response()->json([
                'status' => 200,
                'response' => 'City Code successfully added!'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'response' => '[Failed] City Code was not added.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($city_codes)
    {
        $value = CityCode::find($city_codes);

        if($value){
            return response()->json([
                'status' => 200,
                'airline' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'City Code with id ' . $city_codes . ' was not found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($city_codes)
    {
        $value = CityCode::find($city_codes);

        if($value){
            return response()->json([
                'status' => 200,
                'airline' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'City Code with id ' . $city_codes . ' was not found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecity_codesRequest $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:3',
            'city_name' => 'required|string|max:100'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $city_codes = CityCode::find($id);

            if($city_codes){
                $city_codes->update([
                    'code' => $request->code,
                    'city_name' => $request->city_name
                ]);

                return response()->json([
                    'status' => 200,
                    'response' => 'City Code successfully updated!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'response' => '[Failed] City Code was not updated.'
                ], 500);
            }
            
        }     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $city_codes = CityCode::find($id);

        if($city_codes){

            $city_codes->delete();

            return response()->json([
                'status' => 200,
                'response' => 'City Code with id ' . $id . ' was successfully deleted.'
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'City Code with id ' . $id . ' was not found!'
            ], 404);
        }
    }
}
