<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userPage():Response {
        print_r(Auth::user());
        return response()->view('auth.user')
            ->header('Cache-Control', 'no-cache, must-revalidate, no-store, max-age=0, private');
    }
}
