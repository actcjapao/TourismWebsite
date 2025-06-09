<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use App\Models\Destinations;
use App\Models\Booking;

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

    function submitBooking(Request $request) {
        // validation rules
        $rules = [
            'fullname' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'destinations' => 'required',
            'number_of_guests' => 'required',
            'tour_date' => 'required',
            'pickup_time' => 'required',
            'pickup_location' => 'required'
        ];

        // custom validation messages
        $customErrorMessages = [
            'fullname.required' => 'Fullname field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be an email.',
            'contact.required' => 'Contact field is required.',
            'destinations.required' => 'Destinations field is required.',
            'number_of_guests.required' => 'Guests field is required.',
            'tour_date.required' => 'Tour date field is required.',
            'pickup_time.required' => 'Pick-up time field is required.',
            'pickup_location.required' => 'Pick-up location field is required.',
        ];

        // run validation
        $validator = Validator::make($request->all(), $rules, $customErrorMessages);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Please fill-in the fields completely'
            ], 422);
        } else {
            $isSaveQuerySuccess = false;

            $newBooking = new Booking();
            $newBooking->fullname = $request->fullname;
            $newBooking->email = $request->email;
            $newBooking->contact = $request->contact;
            $newBooking->destinations = $request->destinations;
            $newBooking->number_of_guests = $request->number_of_guests;
            $newBooking->tour_date = $request->tour_date;
            $newBooking->pickup_time = $request->pickup_time;
            $newBooking->pickup_location = $request->pickup_location;
            if ($request->notes != '') {
                $newBooking->notes = $request->notes;
            }
            $isSaveQuerySuccess = $newBooking->save();

            if($isSaveQuerySuccess) {
                return response()->json([
                    'status' => 200,
                    'message' => "Booking Successfully Submitted!",
                    'booking_id' => $newBooking->id
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Internal Server Error",
                ], 500);
            }
        }
    }
}
