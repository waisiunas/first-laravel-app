<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show_home() {
        return redirect()->route('show_users');
        $name = "Waseem";
        return view('home', compact(['name']));
    }
}
