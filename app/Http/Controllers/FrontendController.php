<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Member as Member;

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

      public function add_member_name(VerifyUser $request){
        $member = Member::where('confirmation','=',$request->code)->first();
        $member->name = $request->name;
        $member->confirmed = true;
        $member->save();
        return redirect()->route('/');
    }
}
