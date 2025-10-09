<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

// Public
Route::get('/register', function () { return view('auth.register'); });
Route::get('/login', function () { return view('auth.login'); });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::resource('blogs', BlogController::class);
});