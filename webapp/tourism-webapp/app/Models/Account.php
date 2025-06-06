<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = "accounts";

    protected $fillable = [
        'firstname',
        'lastname',
        'usertype',
        'username',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
