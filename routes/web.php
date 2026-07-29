<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');



Route::middleware(['auth.custom'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
Route::delete('/destroy/{id}', [AuthController::class, 'destroy'])->name('users.destroy');
Route::get('/edit/{id}', [AuthController::class, 'update'])->name('users.edit');

});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



