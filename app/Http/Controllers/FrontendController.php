<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FrontendController extends Controller
{
    public function home(){
    	if(Auth::check()){
    		return view('backend.groups');
    	} else {
    		 return view('frontend.landing');
    	}
    }

    public function about(){
    	return view('frontend.about');
    }

    public function login(){
        return view('frontend.login_form');
    }
}
