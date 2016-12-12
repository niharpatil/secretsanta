<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\Group as Group;
use App\Member as Member;

class LogicAPIController extends Controller
{
    //core algorithm to entire application
    public function distribute(Request $request){
    	$group = Group::find($request->id);
    	$members = $group->members()->get()->all();
    	$ids = [];
    	$copy = [];
    	foreach($members as $member){
    		array_push($ids, $member->id);
    		array_push($copy, $member->id);
    	}
    	$flag = true;
    	while($flag){
    		shuffle($copy);
    		for($i = 0; $i < count($copy); $i++){
    			if($copy[$i] == $ids]$i){
    				$flag = true;
    				break;
    			} else {
    				continue;
    			}
    		}
    		$flag = false;
    	}
    }
}
