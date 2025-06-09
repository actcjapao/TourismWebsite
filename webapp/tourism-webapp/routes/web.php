<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

// public
use App\Http\Controllers\AuthenticationController;

// admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUsersController;

// manager
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\ManagerBookingsController;

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
    // Restrict to specific environments only
    $allowedEnvs = ["dev", "development", "staging", "test"];
    
    if (!App::environment($allowedEnvs)) {
        abort(403, 'Access denied. This route is not available in '.App::environment().' environment.');
    }

    if($operation == null) {
        echo "- Specify a proper URL";
    } else if ($operation == "view") {
        $existingSession = session()->all();
        dd($existingSession);
    } else if ($operation == "clear") {
        session()->pull('auth_token');
        echo "- All session data has been flushed (hard reset).";
    } else if ($operation === "flush") {
        session()->flush();
        echo "- All session data has been flushed (hard reset).";
    } else {
        echo "- Specify a proper URL";
    }
});

Route::get('/', [LandingController::class, 'load'])->name('landing.load');

// cja: authentication middleware routers implementation
Route::middleware(['authentication'])->group(function () {
    Route::get('/manage', [AuthenticationController::class, 'loadLogin'])->name('login.load');
    
    Route::get('/manage/admin/dashboard', [AdminDashboardController::class, 'load'])->name('admin.dashboard.load');
    Route::get('/manage/admin/users', [AdminUsersController::class, 'load'])->name('admin.users.load');

    Route::get('/manage/manager/dashboard', [ManagerDashboardController::class, 'load'])->name('manager.dashboard.load');
    Route::get('/manage/manager/bookings', [ManagerBookingsController::class, 'load'])->name('manager.bookings.load');
});

Route::post('/login', [AuthenticationController::class, 'login'])->name('account.login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('account.logout');

Route::post('/submit-booking', [LandingController::class, 'submitBooking'])->name('booking.submit');
Route::post('/save-user', [AdminUsersController::class, 'saveUser'])->name('user.save');
