<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group as Group;

class BackendController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
	}

    public function home(){
    	return view('backend.groups');
    }
}
