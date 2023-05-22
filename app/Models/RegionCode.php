<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCode extends Model
{
    use HasFactory;

    // RegionCode belongs to an airport
    public function airport() {
        return $this->belongsTo(Airport::class);
    }
}
