<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_view() {
        return view('auth.login');
    }

    public function register_view() {
        return view('auth.register');
    }
}
