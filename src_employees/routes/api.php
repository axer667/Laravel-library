<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibrarianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group([
    'middleware' => 'api',
], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});

Route::group([
    'middleware' => ['jwt.auth']
], function () {
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    Route::prefix('librarian')->middleware('check.assignments:1')->group(function() {
        Route::get('/leasing', [LibrarianController::class, 'booksInLease']);
    });
});




