<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index(){
        $user = "Fadly";
        return view('home', compact('user'));
    }
}
