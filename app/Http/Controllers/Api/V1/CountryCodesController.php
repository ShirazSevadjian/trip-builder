<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Storecountry_codesRequest;
use App\Http\Requests\Updatecountry_codesRequest;
use App\Models\country_codes;
use App\Http\Controllers\Controller;

class CountryCodesController extends Controller
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
    public function store(Storecountry_codesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(country_codes $country_codes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(country_codes $country_codes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecountry_codesRequest $request, country_codes $country_codes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(country_codes $country_codes)
    {
        //
    }
}
