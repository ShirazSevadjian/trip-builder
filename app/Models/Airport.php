<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $table = 'airports';

    protected $fillable = [
        'iata',
        'name',
        'city_code',
        'country_code',
        'region_code',
        'latitude',
        'longitude',
        'timezone'
    ];

    // Airport has a city code
    public function cityCode(): HasOne {
        return $this->hasOne(CityCodes::class);
    }

    // Airport has a timezone
    public function timezone(): HasOne {
        return $this->hasOne(Timezone::class);
    }

    // Airport has a region code
    public function regionCode(): HasOne {
        return $this->hasOne(RegionCode::class);
    }

    // Airport has a country code
    public function countryCode(): HasOne {
        return $this->hasOne(CountryCode::class);
    }

    // Airport belongs to a flight
    public function flight(): BelongsTo {
        return $this->belongsTo(Flight::class);
    }
}
