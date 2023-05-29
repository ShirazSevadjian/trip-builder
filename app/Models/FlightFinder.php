<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightFinder extends Model
{
    use HasFactory;

    public function airlines() {
        return $this->belongsTo(Airline::class);
    }

    public function airports() {
        return $this->belongsTo(Airport::class);
    }
}
