<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Storeregion_codesRequest;
use App\Http\Requests\Updateregion_codesRequest;
use App\Models\region_codes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegionCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RegionCode::all();

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
    public function store(Storeregion_codesRequest $request)
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
            $region_codes = RegionCode::create([
                'code' => $request->code,
                'name' => $request->name
            ]);
        }

        if($region_codes){
            return response()->json([
                'status' => 200,
                'response' => 'Region Code successfully added!'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'response' => '[Failed] Region Code was not added.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(region_codes $region_codes)
    {
        $value = RegionCode::find($region_codes);

        if($value){
            return response()->json([
                'status' => 200,
                'region_code' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Region Code with id ' . $region_codes . ' was not found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($region_codes)
    {
        $value = RegionCode::find($region_codes);

        if($value){
            return response()->json([
                'status' => 200,
                'region_code' => $value
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Region Code with id ' . $region_codes . ' was not found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateregion_codesRequest $request, int $id)
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
            $region_codes = RegionCode::find($id);

            if($region_codes){
                $region_codes->update([
                    'code' => $request->code,
                    'name' => $request->name
                ]);

                return response()->json([
                    'status' => 200,
                    'response' => 'Region Code successfully updated!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'response' => '[Failed] Region Code was not updated.'
                ], 500);
            }
            
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $region_codes = RegionCode::find($id);

        if($region_codes){

            $region_codes->delete();

            return response()->json([
                'status' => 200,
                'response' => 'Region Code with id ' . $id . ' was successfully deleted.'
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'response' => 'Region Code with id ' . $id . ' was not found!'
            ], 404);
        }
    }
}
