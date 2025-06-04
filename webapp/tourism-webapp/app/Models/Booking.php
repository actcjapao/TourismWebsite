<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";

    protected $fillable = [
        'fullname',
        'email',
        'contact',
        'destinations',
        'number_of_guests',
        'tour_date',
        'pickup_time',
        'pickup_location',
        'notes',
        'status'
    ];
}
