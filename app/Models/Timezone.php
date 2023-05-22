<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    use HasFactory;

    // Timezone belongs to the airport
    public function airport(): BelongsTo {
        return $this->belongsTo(Airport::class);
    }
}
