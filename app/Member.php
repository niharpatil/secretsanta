<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','email','group_id','confirmed'];
    protected $table = 'members';

    public function group(){
    	return $this->belongsTo('App\Group');
    }
}
