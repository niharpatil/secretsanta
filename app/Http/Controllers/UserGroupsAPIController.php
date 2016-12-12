<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\Group as Group;
use App\Member as Member;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class UserGroupsAPIController extends Controller
{

    public function user(Request $request){
        $user = User::find($request->id);
        return response()->json($user);
    }

    public function post_create_user(Request $request){
    	$this->validate($request, [
    		'name'=>'required',
    		'email'=>'required',
    		'password'=>'required'
		]);

		$user = User::where('email', '=', $request->email)->first();
		if($user != null){
			$message = "User with given email already exists";
			return response()->json($message);
		}
    	
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->save();

    	//fine because API is still stateless
    	Auth::loginUsingId($user->id, true);
    	return response()->json("ok");
    }

    public function post_create_group_data(Request $request){
    	$this->validate($request, [
    		'user_id' => 'required',
    		'group_name' => 'required|max:255',
    		'emails' => 'required',
    		'group_size' => 'required'
    	]);

    	$group = new Group;
    	$group->user_id = $request->user_id;
    	$group->group_name = $request->group_name;
    	$group->save();

    	$emails = explode(",",$request->emails);
    	foreach($emails as $email){
    		if(!is_numeric($email)){
    			$member = new Member;
    			$member->name = "";
    			$member->group_id = $group->id;
    			$member->email = $email;
    			$member->confirmed = false;
    			$member->save();
    		}
    	}
    }

    public function get_group_data(Request $request){
    	$user = User::find($request->user_id);
    	$groups = $user->groups()->get()->all();
    	foreach($groups as $group){
    		$members = $group->members()->get()->all();
    		$group->members = $members;
    	}
    	return response()->json($groups);
    }

    public function get_form_data_by_group_id(Request $request){
        $group = Group::find($request->group_id);
        $members = $group->members()->get()->all();
        $emails = [];
        foreach($members as $member){
            array_push($emails,$member->email);
        }
        $group_name = $group->group_name;
        $return = [
            'emails' => $emails,
            'group_name' => $group_name
        ];
        return response()->json([$emails,$group_name]);
    }


    
    //still in the works
    public function edit_group(Request $request){
        $emails = explode(",", $request->emails);
        $group = Group::find($request->group_id);
        if($group == null){
            return response()->json("Something went wrong...");
        }
        $group->update(['group_name' => $request->group_name]);
        $members = $group->members()->get()->all();
        if(empty($members)){
            foreach($emails as $email){
                if(is_numeric($email) or $email == ""){
                    continue;
                } else {
                    $member = new Member;
                    $member->name = "";
                    $member->group_id = $group->id;
                    $member->email = $email;
                    $member->confirmed = false;
                    $member->save();
                }
            }
        } else {
            foreach($members as $member){
                foreach($emails as $email){
                if(is_numeric($email) or $member->email == $email or $email == ""){
                    continue;
                } else {
                    $member = new Member;
                    $member->name = "";
                    $member->group_id = $group->id;
                    $member->email = $email;
                    $member->confirmed = false;
                    $member->save();
                }
        }
            }
        }
        
        return response()->json("finished");
    }

    
}
