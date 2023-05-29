<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airline;

class AirlineController extends Controller
{
    public function index()
    {
        $data = Airline::all();

        return view('airlines', compact('data'));
        
    }
}
