<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
// LOGIN
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

// DASHBOARD
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Resource
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);