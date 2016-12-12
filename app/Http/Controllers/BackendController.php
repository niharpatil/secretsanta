<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group as Group;
use App\User as User;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitePerson as InvitePerson;


class BackendController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
	}

    public function home(){
    	return view('backend.groups');
    }

    public function sendMail(){
    	$user = User::find(14);

    	Mail::to('nihar.patil98@gmail.com')->send(new InvitePerson($user));
    }
}
