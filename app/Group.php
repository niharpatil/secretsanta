<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['user_id','group_name','locks_on','arrangements_sent'];
    protected $table = 'groups';

    public function members(){
    	return $this->hasMany('App\Member');
    }

    public function owner(){
    	return $this->belongsTo('App\User');
    }
}
