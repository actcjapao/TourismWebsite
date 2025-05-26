<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

use App\Models\Account;

class AuthenticationController extends Controller
{
    function loadLogin() {
        return view('auth/login');
    }

    function login(Request $r) {
        // validation rules
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        // custom error messages
        $customErrorMessages = [
            'username.required' => 'Username field is required',
            'password.required' => 'Password field is required'
        ];

        // run validation
        $validator = Validator::make($r->all(), $rules, $customErrorMessages);
        
        $authResponseData = array();
        if(!$validator->fails()) {
            $user = Account::where('username', $r->username)->first();
            
            if($user) {
                $isValidUser = Hash::check($r->password, $user->password);
                if($isValidUser) {
                    // if account valid
                    $objectToken = [
                        'account_id' => $user->account_id
                    ];

                    $auth_token = Hash::make(json_encode($objectToken));
                    session()->put('auth_token', $auth_token);
                    session()->put('authenticated_id', $user->account_id);
                    session()->put('authenticated_usertype', $user->usertype);

                    array_push($authResponseData, [
                        'status_code' => 200,
                        'message' => 'OK',
                    ]);

                    if ($user->usertype == "admin") {
                        return redirect()->route('admin.dashboard.load')->with('authResponseData', $authResponseData);
                    } else if ($user->usertype == "manager") {
                        return redirect()->route('manager.dashboard.load')->with('authResponseData', $authResponseData);
                    }
                }
            }
        }

        // if inputs are empty, user email is invalid and password account invalid
        array_push($authResponseData, [
            'status_code' => 406,
            'message' => 'Not Acceptable'
        ]);

        // if ($validator->fails()) {
        //     Log::warning('Validation failed during login:', [
        //         'errors' => $validator->errors()->toArray(),
        //         'input' => $r->all()
        //     ]);
        // }
        
        return redirect()->back()->with('authResponseData', $authResponseData);
    }
}
