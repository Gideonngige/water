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
    public function login(){
        return view('water.login');
    }
    public function messages(){
        return view('water.messages');
    }
    public function admin(){
        return view('water.admin');
    }
}
