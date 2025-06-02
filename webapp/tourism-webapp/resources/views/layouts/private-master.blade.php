@php
$user = session('authenticated_user');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- csrf-token generator --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="icon" href="{{ asset('assets/icon/denji_icon.png') }}" type="image/x-icon"> --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/manual.css') }}">
    <link href="{{ asset('assets/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/sidebar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/notyf/notyf.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bsv5-datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    @yield('view_styles')
    <title>M J | @yield('view_title')</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <h5 class="font-weight-600 text-center mt-2"><span class="text-orange">MJ</span> Bohol Tours</h5>
                <div class="text-center mt-sm-3">
                    {{-- <i class="fas @portalIcon text-secondary"></i> <small class="text-dark">@portalText</small> --}}
                </div>
            </div>
            <div class="list-group list-group-flush">
                @if ($user->usertype == 'admin')
                    <a href="{{ route('admin.dashboard.load') }}" class="list-group-item list-group-item-action list-group-item-light border-top p-3 {{ $page == "admin_dashboard" ? "active_item" : ""}}">
                        <i class="bi bi-bar-chart-line {{ $page == "admin_dashboard" ? "active-item-icon" : ""}}"></i>
                        <span class="ms-2 {{ $page == "admin_dashboard" ? "active-item-text" : ""}}">Dashboard</span>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action list-group-item-light border-top p-3 {{ $page == "admin_bookings" ? "active_item" : ""}}">
                        <i class="bi bi-calendar-check {{ $page == "admin_bookings" ? "active-item-icon" : ""}}"></i>
                        <span class="ms-2 {{ $page == "admin_bookings" ? "active-item-text" : ""}}">Bookings</span>
                    </a>

                    {{-- For manager --}}
                    {{-- <a class="list-group-item list-group-item-action list-group-item-light border-top p-3 {{ $page == "admin_vans" ? "active_item" : ""}}">
                        <i class="bi bi-calendar-check {{ $page == "admin_vans" ? "active-item-icon" : ""}}"></i>
                        <span class="ms-2 {{ $page == "admin_vans" ? "active-item-text" : ""}}">Vans</span>
                    </a> --}}

                    <a href="{{ route('admin.users.load') }}" class="list-group-item list-group-item-action list-group-item-light border-top p-3 {{ $page == "admin_users" ? "active_item" : ""}}">
                        <i class="bi bi-people {{ $page == "admin_users" ? "active-item-icon" : ""}}"></i>
                        <span class="ms-2 {{ $page == "admin_users" ? "active-item-text" : ""}}">Users</span>
                    </a>
                @endif

                @if ($user->usertype == 'manager')
                    <a href="{{ route('manager.dashboard.load') }}" class="list-group-item list-group-item-action list-group-item-light border-top p-3 {{ $page == "manager_dashboard" ? "active_item" : ""}}">
                        <i class="bi bi-bar-chart-line {{ $page == "manager_dashboard" ? "active-item-icon" : ""}}"></i>
                        <span class="ms-2 {{ $page == "manager_dashboard" ? "active-item-text" : ""}}">Dashboard</span>
                    </a>

                    <a href="{{ route('manager.bookings.load') }}" class="list-group-item list-group-item-action list-group-item-light border-top p-3 {{ $page == "manager_bookings" ? "active_item" : ""}}">
                        <i class="bi bi-calendar-check {{ $page == "manager_bookings" ? "active-item-icon" : ""}}"></i>
                        <span class="ms-2 {{ $page == "manager_bookings" ? "active-item-text" : ""}}">Bookings</span>
                    </a>
                @endif

                <a href="#" class="list-group-item list-group-item-action list-group-item-light border-bottom p-3" data-bs-toggle="modal" data-bs-target="#confirm_logout_modal">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="ms-2 text-secondary">Logout</span>
                </a>
            </div>
        </div>

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-sm-4">
                <div class="container-fluid">
                    <button class="btn btn-default mx-2" id="sidebarToggle"><i class="fas fa-bars text-dark"></i></button>

                    <span class="ms-sm-2 text-dark font-weight-600">{{ $user->firstname.' '.$user->lastname }}</span> 
                    &nbsp; <span class="font-weight-600 text-secondary">|</span> &nbsp;
                    <span class="badge bg-success text-uppercase"><i class="bi bi-shield-fill-check"></i> {{ $user->usertype }}</span>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 mx-4 my-2">
                            <li class="nav-item dropdown mt-2">
                                {{-- <span class="mt-2">Account Name</span> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page content-->
            @yield('view_content')
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirm_logout_modal" tabindex="-1" role="dialog"
        aria-labelledby="confirm_logout_modal_label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm_logout_modal_label">Confirm Logout</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('account.logout') }}" method="post">
                        @csrf
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/utils.js') }}"></script>
    <script src="{{ asset('assets/notyf/notyf.min.js') }}"></script>
    <script src="{{ asset('assets/bsv5-datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bsv5-datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    @yield('view_scripts')
</body>
</html>
