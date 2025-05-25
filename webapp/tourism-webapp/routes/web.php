<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Temp Route --> This route is intended for managing session data
Route::get('/session/{operation?}', function($operation = null){
    if($operation == null) {
        echo "- Specify a proper URL";
    } else if ($operation == "view") {
        $existingSession = session()->all();
        dd($existingSession);
    } else if ($operation == "clear") {
        session()->pull('auth_token');
    } else {
        echo "- Specify a proper URL";
    }
});

Route::get('/', [LandingController::class, 'load'])->name('landing.load');
Route::get('/manage', [AuthenticationController::class, 'loadLogin'])->name('login.load');
Route::get('/manage/admin-dashboard', [AdminDashboardController::class, 'load'])->name('admin.dashboard.load');
Route::get('/manage/manager-dashboard', [ManagerDashboardController::class, 'load'])->name('manager.dashboard.load');

Route::post('/login', [AuthenticationController::class, 'login'])->name('account.login');