<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/registration', function () {
    return view('auth.registration');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::prefix('/user')->group(function() {
    Route::get('/', [UserController::class, 'userPage']);
});
