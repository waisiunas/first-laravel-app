<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show_home() {
        $name = "Waseem";
        return view('home', compact(['name']));
    }
}
