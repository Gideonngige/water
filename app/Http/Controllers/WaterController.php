<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaterController extends Controller
{
    public function home(){
        return view('water.layout');
    }
    public function bill(){
        return view('water.bill');
    }
    public function register(){
        return view('water.register');
    }
}
