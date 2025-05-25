<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    function loadLogin() {
        return view('auth/login');
    }
}
