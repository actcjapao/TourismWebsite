<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    private $page;

    public function __construct()
    {
        $this->page = "admin_dashboard";
    }

    function load() {
        $page = $this->page;
        return view('admin/dashboard', compact('page'));
    }
}
