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
            <div class="card shadow-sm border-0">
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                <td>John Doe</td>
                                <td>Sample destinations</td>
                                <td>5</td>
                                <td>June 20, 2025</td>
                                <td>unverified</td>
                                <td>Edit</td>
                               </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('view_scripts')
<script>
    $(document).ready(function () {
        $('#bookingsTable').DataTable({
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
    });
</script>
@endsection