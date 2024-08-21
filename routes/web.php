<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HRLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HRDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'], function(){
    // Guest middleware
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/login', [LoginController::class, 'index'])->name('account.login');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    // Authenticated middleware for employee
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('/apply', [DashboardController::class, 'apply'])->name('account.apply');
        Route::post('/submitapplication', [DashboardController::class, 'submitapplication'])->name('hr.submitapplication');
        Route::get('/leavestatuses', [DashboardController::class, 'displayLeaveApplications'])->name('account.leavestatuses');
    }); 
});

Route::group(['prefix' => 'hr'], function(){
    // Guest middleware
    Route::group(['middleware' => 'hr.guest'], function(){
        Route::get('/hrlogin', [HRLoginController::class, 'index'])->name('hr.login');
        Route::post('/hrauthenticate', [HRLoginController::class, 'authenticate'])->name('hr.authenticate');   
    });

    // Authenticated middleware for hr
    Route::group(['middleware' => 'hr.auth'], function(){
        Route::get('/dashboard', [HRDashboardController::class, 'index'])->name('hr.dashboard');
        Route::get('/logout', [HRLoginController::class, 'logout'])->name('hr.logout');
        Route::get('/registeremployee', [HRDashboardController::class, 'register'])->name('hr.emregister');
        Route::post('/makeregistration', [HRDashboardController::class, 'makeRegistration'])->name('hr.doemregister');
        Route::get('/totalemployees', [HRDashboardController::class, 'displayEmployees'])->name('hr.totalemployees');
        Route::get('/totalapplications', [HRDashboardController::class, 'displayTotalApplications'])->name('hr.totalapplications');
        Route::get('/pendingapplications', [HRDashboardController::class, 'displayPendingApplications'])->name('hr.pendingapplications');
    }); 
});