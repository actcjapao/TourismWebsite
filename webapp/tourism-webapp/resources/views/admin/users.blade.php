@extends('layouts.private-master')
@section('view_title', 'Accounts')

@section('view_content')
<div class="container-fluid py-4 px-md-4 px-3 bg-light min-vh-100">

    <!-- Page Heading -->
    <div class="row mb-3">
        <div class="col-8">
            <h2 class="fw-semibold text-secondary">User Accounts</h2>
            <p class="text-muted">View and manage all accounts in the system.</p>
        </div>
        <div class="col-md-4 text-md-end text-start">
            <!-- Add New Account Button -->
            <button class="btn btn-orange mt-md-4 mt-2" data-bs-toggle="modal" data-bs-target="#addAccountModal">
                + Add New Account
            </button>
        </div>
    </div>

    <!-- Accounts Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="table-responsive mx-1 my-1 py-3 px-2">
                        <table class="table table-hover" id="accountTable">
                            <thead class="table-white">
                                <tr>
                                    <th>Account ID</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>User Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Account Modal -->
    <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('user.save') }}" method="POST" class="modal-content" id="save_account_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addAccountModalLabel">Add New Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="account_id" name="account_id" value="0">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="usertype" class="form-label">User Type</label>
                        <select class="form-select" id="usertype" name="usertype" required>
                            <option selected disabled>Choose user type</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-orange" id="btnSaveAccount">Save Account</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('view_scripts')
<script>
    $(document).ready(function () {
        $('#accountTable').DataTable({
            columns: [
                { data: 'account_id' },
                { data: 'fullname' },
                { data: 'username' },
                { data: 'usertype' },
                { data: 'status' },
                { data: 'actions', orderable: false, searchable: false }
            ]
        });
    });

    function addRowToDataTable(new_row) {
        let accountTable = $('#accountTable').DataTable();
        accountTable.row.add({ ...new_row }).draw();
    }

    $("#save_account_form").submit(function(e) {
        e.preventDefault();
        loadingState($('#btnSaveAccount'), true, 'Saving');

        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        const account_id = $('#account_id').val();
        const firstname = $('#firstname').val();
        const lastname = $('#lastname').val();
        const username = $('#username').val()
        const usertype = $('#usertype').val();
        const password = $('#password').val();

        const formData = {
            _token: csrf_token,
            account_id,
            firstname,
            lastname,
            username,
            usertype,
            password
        };

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                const { status, message, account_id } = response
                
                if (status == 200) {
                    $('#save_account_form')[0].reset();
                    
                    $('#addAccountModal').modal('hide'); 

                    addRowToDataTable({ 
                        account_id, 
                        fullname: `${formData.firstname} ${formData.lastname}`, 
                        username: formData.username,
                        usertype: formData.usertype, 
                        status: 'active',
                        actions: `<i account-id="${ account_id }" class="bi bi-pencil-fill" onclick="alert('Functionality not yet available')"></i>`
                    });

                    showNotyf(message);
                    
                    loadingState($('#btnSaveAccount'), false, 'Save Account');
                }
            },
            error: function(xhr) {
                if (xhr.status == 419) {
                    console.log("Unauthorized"); // no token error
                } else if (xhr.status == 422) {
                    console.log(
                        `Missing Params - Resulted to "${xhr.statusText}" error.`
                    );
                } else if (xhr.status == 500) {
                    console.log("Internal Server Error"); // unknow error
                }

                loadingState($('#btnSaveAccount'), false, 'Save Account');
            }
        });

    });
</script>


@endsection