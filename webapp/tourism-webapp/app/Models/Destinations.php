<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    use HasFactory;

    protected $table = "destinations";

    protected $fillable = [
        'name',
        'address',
        'cloudinary_url',
        'local_url',
        'alt',
        'source',
        'status'
    ];
}
