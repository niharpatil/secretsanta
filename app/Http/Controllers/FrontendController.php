<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
    	return view('frontend.landing');
    }

    public function about(){
    	return view('frontend.about');
    }
}
