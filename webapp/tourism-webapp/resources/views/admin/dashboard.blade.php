@extends('layouts.private-master')
@section('view_title', 'Dashboard')

@section('view_content')
<div class="container-fluid py-4 px-md-4 px-3 bg-light min-vh-100">

    <!-- Welcome Message -->
    <div class="row mb-3">
        <div class="col-12">
            <h4 class="fw-bold text-orange">Welcome, Admin Cariel!</h4>
            <p class="text-muted mb-0">Here’s an overview of today’s activities and stats.</p>
        </div>
    </div>

    <!-- Dashboard Title -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-semibold text-secondary">Dashboard</h2>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <!-- Verified Bookings -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <p class="text-uppercase fw-semibold text-muted mb-2">Verified Bookings</p>
                    <h3 class="fw-semibold text-success">12</h3>
                </div>
            </div>
        </div>

        <!-- Van Count -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <p class="text-uppercase fw-semibold text-muted mb-2">Available Vans</p>
                    <h3 class="fw-semibold text-info">5</h3>
                </div>
            </div>
        </div>

        <!-- User Count -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <p class="text-uppercase fw-semibold text-muted mb-2">Registered Users</p>
                    <h3 class="fw-semibold text-warning">45</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tour Details for Today -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white fw-semibold">
                    Today's Tour Details - {{ date('F d, Y') }}
                </div>
                <div class="card-body">
                    <p><strong>Tour:</strong> Chocolate Hills & Panglao Beach</p>
                    <p><strong>Guests:</strong> 8</p>
                    <p><strong>Pickup Time:</strong> 8:00 AM</p>
                    <p><strong>Pickup Location:</strong> Henann Resort</p>
                    <p><strong>Assigned Van:</strong> Van #3 - Toyota Hiace</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Tours -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white fw-semibold">
                    Upcoming Tours
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <strong>May 28:</strong> Tarsier Sanctuary & Loboc River Cruise
                            </span>
                            <span class="badge bg-info rounded-pill">6 Guests</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <strong>May 29:</strong> Man-Made Forest & Panglao Beach
                            </span>
                            <span class="badge bg-info rounded-pill">4 Guests</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <strong>May 30:</strong> Chocolate Hills Tour
                            </span>
                            <span class="badge bg-info rounded-pill">10 Guests</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection