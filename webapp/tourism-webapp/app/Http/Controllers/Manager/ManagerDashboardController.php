<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerDashboardController extends Controller
{
    private $page;

    public function __construct()
    {
        $this->page = "manager_dashboard";
    }

    function load() {
        $page = $this->page;
        return view('manager/dashboard', compact('page'));
    }
}
