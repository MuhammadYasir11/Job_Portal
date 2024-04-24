<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //this method will be show on home page
    public function index(){

        return view('front.home');
    }
}
