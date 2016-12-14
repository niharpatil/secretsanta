<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member as Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShowAssignment as ShowAssignment;

class ArrangementMailController extends Controller
{
    public static function sendArrangements($arrangements){
    	$members = $arrangements['members'];
    	$assigned = $arrangements['assigned'];

    	for($i = 0; $i < sizeof($members); $i++){
    		$member = Member::find($members[$i]);
    		$assigned = Member::find($assigned[$i]);
    		$group_name = $member->group()->first()->group_name;
			Mail::to($member)->send(new ShowAssignment($assigned->name, $group_name));
    	}
    }
}
