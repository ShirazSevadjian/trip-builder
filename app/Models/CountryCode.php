<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    use HasFactory;

    protected $table = 'country_codes';

    protected $fillale = [
        'code',
        'name'
    ];

    // CountryCode belongs to an airport
    public function airport(): BelongsTo {
        return $this->belongsTo(Airport::class);
    }
}
