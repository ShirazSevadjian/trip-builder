<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityCode extends Model
{
    use HasFactory;

    protected $table = 'city_codes';

    protected $fillable = [
        'code',
        'city_name'
    ];

    // CityCode belongs to an airport
    public function airport(): BelongsTo {
        return $this->belongsTo(Airport::class);
    }
}
