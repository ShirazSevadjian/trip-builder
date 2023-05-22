<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityCode extends Model
{
    use HasFactory;

    // CityCode belongs to an airport
    public function airport(): BelongsTo {
        return $this->belongsTo(Airport::class);
    }
}
