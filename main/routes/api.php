<?php

use App\Http\Controllers\Frontend\ChatBotController;
use Illuminate\Support\Facades\Route;

// ChatBot Routes
Route::middleware('auth')->prefix('api')->group(function () {
	Route::post('/chatbot/clear', [ChatBotController::class, 'clear']);
});
Route::prefix('api')->group(function () {
	Route::post('/chatbot/send', [ChatBotController::class, 'send']);
	Route::get('/chatbot/history', [ChatBotController::class, 'history']);
});
