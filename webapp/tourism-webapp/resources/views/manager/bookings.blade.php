@extends('layouts.private-master')
@section('view_title', 'Accounts')

@section('view_content')
<div class="container-fluid py-4 px-md-4 px-3 bg-light min-vh-100">

    <!-- Page Heading -->
    <div class="row mb-3">
        <div class="col-12">
            <h2 class="fw-semibold text-secondary">Bookings</h2>
            <p class="text-muted">View and manage tourist bookings.</p>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0" id="bookingListCard">
                <div class="card-body">
                    <div class="table-responsive mx-1 my-1 py-3 px-2">
                        <table class="table table-sm table-hover" id="bookingsTable">
                            <thead class="table-white">
                                <tr>
                                    <th>Name</th>
                                    <th>Destinations</th>
                                    <th>Guests</th>
                                    <th>Tour Date</th>
                                    <th>Status</th>
                                    <th class="d-none">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- View Booking Card -->
            <div class="card shadow-sm border-0 mt-3" id="viewBookingCard" style="display: none;">
                <div class="card-body">
                    <h5 class="modal-title text-secondary">
                        <i class="bi bi-arrow-left text-orange" style="cursor:pointer;" onclick="hideViewBookingCard()"></i>
                        Booking Details
                    </h5>

                    <dl class="row mb-0 mt-3 ms-2">
                        <dt class="col-sm-4">Full Name</dt>
                        <dd class="col-sm-8" id="viewFullname"></dd>

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8" id="viewEmail"></dd>

                        <dt class="col-sm-4">Contact</dt>
                        <dd class="col-sm-8" id="viewContact"></dd>

                        <dt class="col-sm-4">Destinations</dt>
                        <dd class="col-sm-8" id="viewDestinations"></dd>

                        <dt class="col-sm-4">Guests</dt>
                        <dd class="col-sm-8" id="viewGuests"></dd>

                        <dt class="col-sm-4">Tour Date</dt>
                        <dd class="col-sm-8" id="viewTourDate"></dd>

                        <dt class="col-sm-4">Pickup Time</dt>
                        <dd class="col-sm-8" id="viewPickupTime"></dd>

                        <dt class="col-sm-4">Pickup Location</dt>
                        <dd class="col-sm-8" id="viewPickupLocation"></dd>

                        <dt class="col-sm-4">Notes</dt>
                        <dd class="col-sm-8" id="viewNotes"></dd>

                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8" id="viewStatus"></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('view_scripts')
<script>
    $(document).ready(function () {
        const bookingsTable = $('#bookingsTable');

        bookingsTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("manager.get.bookings") }}',
            pageLength: 10,
            columns: [
                { data: 'name' },
                { data: 'destinations' },
                { data: 'guests' },
                { data: 'tour_date' },
                { data: 'status' },
                { data: 'actions', orderable: false, searchable: false }
            ]
        });
        
        $(document).on('click', '.view-booking', function () {
            const booking = $(this).data('booking');

            $('#viewFullname').text(booking.fullname);
            $('#viewEmail').text(booking.email);
            $('#viewContact').text(booking.contact);
            $('#viewDestinations').text(booking.destinations);
            $('#viewGuests').text(booking.number_of_guests);
            $('#viewTourDate').text(formatDate(booking.tour_date));
            $('#viewPickupTime').text(booking.pickup_time);
            $('#viewPickupLocation').text(booking.pickup_location);
            $('#viewNotes').text(booking.notes);
            $('#viewStatus').text(booking.status);

            $('#viewBookingCard').show();
            $('#bookingListCard').hide();
        });

        function formatDate(dateStr) {
            const date = new Date(dateStr);
            return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        }
    });

    function hideViewBookingCard() {
        $('#viewBookingCard').hide();

        $('#viewFullname').text("");
        $('#viewEmail').text("");
        $('#viewContact').text("");
        $('#viewDestinations').text("");
        $('#viewGuests').text("");
        $('#viewTourDate').text("");
        $('#viewPickupTime').text("");
        $('#viewPickupLocation').text("");
        $('#viewNotes').text("");
        $('#viewStatus').text("");
            
        $('#bookingListCard').show();
    }
</script>
@endsection