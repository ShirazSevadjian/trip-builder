<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Storecountry_codesRequest;
use App\Http\Requests\Updatecountry_codesRequest;
use App\Models\country_codes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CountryCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CountryCode::all();

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
    public function store(Storecountry_codesRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:3',
            'name' => 'required|string|max:100'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $country_codes = CountryCode::create([
                'code' => $request->code,
                'name' => $request->name
            ]);
        }

        if($country_codes){
            return response()->json([
                'status' => 200,
                'response' => 'Country Code successfully added!'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'response' => '[Failed] Country Code was not added.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($country_codes)
    {
        $value = CountryCode::find($country_codes);

        if($value){
            return response()->json([
                'status' => 200,
                'airline' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Country Code with id ' . $country_codes . ' was not found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($country_codes)
    {
        $value = CountryCode::find($country_codes);

        if($value){
            return response()->json([
                'status' => 200,
                'airline' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Country Code with id ' . $country_codes . ' was not found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecountry_codesRequest $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:3',
            'name' => 'required|string|max:100'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422); //Throw a 422 error (input error)
        }
        else {
            $country_codes = CountryCode::find($id);

            if($country_codes){
                $country_codes->update([
                    'code' => $request->code,
                    'name' => $request->name
                ]);

                return response()->json([
                    'status' => 200,
                    'response' => 'Country Code successfully updated!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'response' => '[Failed] Country Code was not updated.'
                ], 500);
            }
            
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country_codes = CountryCode::find($id);

        if($country_codes){

            $country_codes->delete();

            return response()->json([
                'status' => 200,
                'response' => 'Country Code with id ' . $id . ' was successfully deleted.'
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Country Code with id ' . $id . ' was not found!'
            ], 404);
        }
    }
}
