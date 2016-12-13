<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitePerson as InvitePerson;
use App\User as User;
use App\Member as Member;

class InviteAPIController extends Controller
{
    
    public function send_invite(Request $request){
    	$user = User::find($request->user_id);
        $member = Member::where('confirmation','=',$request->code)->first();
        $group = $member->group()->first();
    	Mail::to($member->email)->send(new InvitePerson($user->name,$group->name,$member));
        var_dump(Mail::failures());
    }
}
