<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';

    protected $fillable = [
        'airline',
        'number',
        'departure_airport',
        'departure_time',
        'arrival_airport',
        'arrival_time',
        'price'
    ];

    // Flight belongs to an airline
    public function airline() {
        return $this->belongsTo(Airline::class);
    }

    // Flight has a departure airport
    public function departureAirport(): HasOne {
        return $this->hasOne(Airport::class);
    }

    // Flight has an arrival airport
    public function Airport(): HasOne {
        return $this->hasOne(Airport::class);
    }
}
