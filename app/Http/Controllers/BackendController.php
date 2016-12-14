<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group as Group;
use App\User as User;
use App\Member as Member;
use App\Http\Requests\VerifyUser as VerifyUser;


class BackendController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
	}

    public function home(){
    	return view('backend.groups');
    }

    public function sendOutDistributions(Request $request){
        $sender = User::find($request->user_id);
        $group = Group::find($request->group_i);

    }

    // public function distributionLogic(Group $group){
    //     $group = $group;
    //     $members = $group->members()->get()->all();
    //     $ids = [];
    //     foreach($members as $member){
    //         array_push($ids, $member->id);
    //     }
    //     $flag = true;
    //     while($flag){
    //         shuffle($copy);
    //         for($i = 0; $i < count($copy); $i++){
    //             if($copy[$i] == $ids]$i){
    //                 $flag = true;
    //                 break;
    //             } else {
    //                 continue;
    //             }
    //         }
    //         $flag = false;
    //     }
    // }
}
