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

      public function add_member_name(Request $request){
        $member = Member::where('confirmation','=',$request->code)->first();
        $member->name = $request->name;
        $member->confirmed = true;
        $member->save();
        return view('frontend.thankyou');
    }

    public function verify_user(Request $request){
        if(Auth::check()){
            return view('frontend.mustbeloggedout');
        }
        $member = Member::where('confirmation','=',$request->code)->first();
        if($member==null){
            return response()->json("invalid user code");
        } else if ($member->confirmed) {
            return view('frontend.alreadyconfirmed');
        } else {
            return view('backend.verify_user')->with([
                'member' => $member
                ]);
        }
        
    }
}
