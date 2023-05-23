<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Airline;

class AirlinesList extends Component
{

    public function render()
    {
        return view('livewire.airlines-list', [
            'airlines' => Airline::all(),
        ]);
    }
}
