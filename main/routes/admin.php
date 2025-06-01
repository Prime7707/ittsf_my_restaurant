<?php

use App\Http\Controllers\Backend\AdminDashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth', 'verified','role_check:admin')->prefix('admin/dashboard')->name('admin.')->group(function () {
	Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
	Route::get('/Personal-info', [AdminDashboardController::class, 'profileIndex'])->name('dashboard.personal_info');
	Route::put('/Personal-info', [AdminDashboardController::class, 'profileUpdate']);
	Route::put('/password', [AdminDashboardController::class, 'passwordUpdate'])->name('dashboard.security');
	Route::get('/user_management', [AdminDashboardController::class, 'userManagement'])->name('dashboard.user_management');
	Route::post('/user_management/add-user', [AdminDashboardController::class, 'addUser'])->name('dashboard.user_management.addUser');

});
