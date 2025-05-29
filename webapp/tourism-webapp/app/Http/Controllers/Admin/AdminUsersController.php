<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Account;

class AdminUsersController extends Controller
{
    private $page;

    public function __construct()
    {
        $this->page = "admin_users";
    }

    function load() {
        $page = $this->page;

        $accounts = $this->fetchUserAccounts();

        return view('admin/users', compact('page', 'accounts'));
    }

    function fetchUserAccounts() {
        $accounts = Account::get([
            'account_id',
            'firstname',
            'lastname',
            'usertype',
            'username',
            'status',
        ]);

        return $accounts;
    }

    function saveUser(Request $request) {
         // validation rules
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'usertype' => 'required',
            'password' => 'required',
        ];

        // custom validation messages
        $customErrorMessages = [
            'firstname.required' => 'Firstname field is required.',
            'lastname.required' => 'Lastname field is required.',
            'username.required' => 'Username field is required.',
            'usertype.required' => 'Usertype field is required.',
            'password.required' => 'Password field is required.',
        ];

        // run validation
        $validator = Validator::make($request->all(), $rules, $customErrorMessages);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        } else {
            $isSaveQuerySuccess = false;
            $newAccountId = 0;

            if($request->account_id == 0) {
                $newAccount = new Account();
                $newAccount->firstname = $request->input('firstname');
                $newAccount->lastname = $request->input('lastname');
                $newAccount->username = $request->input('username');
                $newAccount->usertype = $request->input('usertype');
                $newAccount->password = $request->input('password');
                $isSaveQuerySuccess = $newAccount->save();

                $newAccountId = $newAccount->id;
            } else {
                // $project = ProjectModel::join('tbl_project_details AS details', 'tbl_projects.project_detail_id', '=', 'details.pd_id')
                //                    ->where('tbl_projects.project_id', '=', $r->project_id);
                // $isSaveQuerySuccess = $project->update(
                //     [
                //         'details.pd_title' => $r->input('project_details.project_title'),
                //         'details.pd_short_overview' => $r->input('project_details.short_overview'),
                //         'details.pd_long_overview' => $r->input('project_details.long_overview'),
                //         'details.pd_img_url' => $r->input('project_details.project_img_url'),
                //         'details.pd_link' => $r->input('project_details.project_link'),
                //         'tbl_projects.project_is_display' => $r->input('project.project_visibility'),
                //         'tbl_projects.project_status' => $r->input('project.project_status')
                //     ]
                // );
                
                return response()->json([
                    'status' => 200,
                    'message' => "Success: Ready to update",
                ], 200);
            }

            if($isSaveQuerySuccess) {
                return response()->json([
                    'status' => 200,
                    'message' => "New account saved successfully",
                    'account_id' => $newAccountId
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
