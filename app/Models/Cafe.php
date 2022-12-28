<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = [
        "cafe_name",
        "location",
        "gmaps_link",
        "distance",
        "is_open_24h",
        "rating",
        "image",
    ];
}
