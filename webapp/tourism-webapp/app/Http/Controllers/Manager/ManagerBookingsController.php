<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerBookingsController extends Controller
{
    private $page;

    public function __construct()
    {
        $this->page = "manager_bookings";
    }

    function load() {
        $page = $this->page;
        return view('manager/bookings', compact('page'));
    }
}
