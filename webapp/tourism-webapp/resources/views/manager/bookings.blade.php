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

    <!-- Accounts Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="table-responsive mx-1 my-1 py-3 px-2">
                        <table class="table table-sm table-hover" id="accountTable">
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
                                {{-- @foreach ($accounts as $account)
                                    <tr account-id="{{ $account->account_id }}">
                                        <td>{{ $account->account_id }}</td>
                                        <td>{{ $account->firstname }} {{ $account->lastname }}</td>
                                        <td>{{ $account->username }}</td>
                                        <td>{{ ucfirst($account->usertype) }}</td>
                                        <td>{{ $account->status }}</td>
                                        <td>
                                            <i account-id="{{ $account->account_id }}" class="bi bi-pencil-fill" onclick="alert('Functionality not yet available')"></i>
                                        </td>
                                    </tr>
                                @endforeach --}}
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
@endsection