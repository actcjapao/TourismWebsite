<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Destinations;

use App\Helpers\Main;

class LandingController extends Controller
{
    private $destinations;

    public function __construct()
    {
        $this->destinations = $this->getDestinations();
    }

    function getDestinations() {
        $destinations = Destinations::get([
            'destination_id',
            'name',
            'address',
            'local_url',
            'alt',
            'source',
            'status'
        ]);

        return $destinations;
    }

    function load() {
        $basicInfo = Main::getSiteBasicInfo();
        $destinations = $this->destinations;
        return view('landing/landing', compact('destinations', 'basicInfo'));
    }
}
