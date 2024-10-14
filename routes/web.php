<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

// Login Routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('login', [AuthenticatedSessionController::class, 'store']);

// Register Routes
Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);

// Password Reset Routes
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');


// Dashboard Routes
Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('dashboard');


// Routes for each role
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard'); // Tampilan dashboard Admin
    })->middleware('role:admin')->name('admin.dashboard');

    Route::get('/user', function () {
        return view('user.dashboard'); // Tampilan dashboard User
    })->middleware('role:user')->name('user.dashboard');

    Route::get('/owner', function () {
        return view('owner.dashboard'); // Tampilan dashboard Pemilik
    })->middleware('role:owner')->name('owner.dashboard');
});
