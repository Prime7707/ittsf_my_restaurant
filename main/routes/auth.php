<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Frontend\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
	Route::get('register', [RegisteredUserController::class, 'register'])->name('register');
	Route::post('register', [RegisteredUserController::class, 'registerAttempt']);

	Route::get('login', [AuthenticatedSessionController::class, 'login'])->name('login');
	Route::post('login', [AuthenticatedSessionController::class, 'loginAttempt']);

	Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
	Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

	Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
	Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
	Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
	Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
	Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');


	Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
	Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
	Route::put('password', [PasswordController::class, 'update'])->name('password.update');

	Route::post('logout', [AuthenticatedSessionController::class, 'logoutAttempt'])->name('logout');
});

Route::middleware('auth', 'verified', 'role_check:user')->prefix('dashboard')->name('user.')->group(function () {
	Route::get('/', [UserDashboardController::class, 'index'])->name('dashboard');
	Route::get('/info', [UserDashboardController::class, 'profileIndex'])->name('dashboard.info');
	Route::put('/info', [UserDashboardController::class, 'profileUpdate']);
	Route::get('/security_privacy', [UserDashboardController::class, 'securityIndex'])->name('dashboard.security');
	Route::put('/security_privacy', [UserDashboardController::class, 'passwordUpdate']);
});
