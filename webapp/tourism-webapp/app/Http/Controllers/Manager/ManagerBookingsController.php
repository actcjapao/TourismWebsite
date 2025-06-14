<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Booking;
use App\Models\Destinations;

use App\Helpers\Main;

class ManagerBookingsController extends Controller
{
    private $page;

    public function __construct()
    {
        $this->page = "manager_bookings";
    }

    // implement pagination here
    function load() {
        $page = $this->page;
        return view('manager/bookings', compact('page'));
    }

    // Fetches bookings with pagination for DataTables
    public function getBookings(Request $request)
    {
        $columns = [
            0 => 'fullname',
            1 => 'destinations',
            2 => 'number_of_guests',
            3 => 'tour_date',
            4 => 'status',
        ];

        $totalData = Booking::count();

        $query = Booking::select(
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
        );

        // Search
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');

            $query->where(function ($q) use ($search) {
                $q->where('fullname', 'LIKE', "%{$search}%")
                ->orWhere('destinations', 'LIKE', "%{$search}%")
                ->orWhere('number_of_guests', 'LIKE', "%{$search}%")
                ->orWhere('tour_date', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%");
            });
        }

        $totalFiltered = $query->count();

        // Sorting
        $orderColumn = $columns[$request->input('order.0.column', 0)];
        $orderDir = $request->input('order.0.dir', 'asc');
        $query->orderBy($orderColumn, $orderDir);

        // Pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $draw = $request->input('draw');

        $bookings = $query->offset($start)->limit($length)->get();

        $data = [];

        foreach ($bookings as $booking) {
            $destinations = Main::getDestinationNames($booking->destinations);

            $data[] = [
                'name' => $booking->fullname,
                'destinations' => $destinations,
                'guests' => $booking->number_of_guests,
                'tour_date' => \Carbon\Carbon::parse($booking->tour_date)->format('F j, Y'),
                'status' => $booking->status,
                'actions' => '<i account-id="'.$booking->booking_id.'" class="bi bi-search text-orange view-booking" style="cursor: pointer" data-id="'.$booking->booking_id.'"></i>&nbsp;'.
                '<i account-id="'.$booking->booking_id.'" class="bi bi-pencil-fill text-orange" style="cursor: pointer" onclick="alert(\'Functionality not yet available\')"></i>',
            ];
        }

        return response()->json([
            'draw' => intval($draw),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data' => $data,
        ]);
    }

}
