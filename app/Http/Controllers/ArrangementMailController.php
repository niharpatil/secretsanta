<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrangementMailController extends Controller
{
    public static function sendArrangements($arrangements){
    	$members = $arrangements['members'];
    	$assigned = $arrangements['assigned'];
    	
    }
}
