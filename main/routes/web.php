<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
// 	return view('welcome');
// });

Route::group([], function () {
	Route::get('/', [FrontendController::class, 'index'])->name('home');
});

// Route::get('/dashboard', function () {
// 	return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
// 	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// 	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// 	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/api.php';
