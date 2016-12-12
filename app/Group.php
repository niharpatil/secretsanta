<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	use SoftDeletes;
    protected $fillable = ['user_id','group_name','locks_on'];
    protected $table = 'groups';
    protected $dates = ['deleted_at'];
    
    public function members(){
    	return $this->hasMany('App\Member');
    }

    public function owner(){
    	return $this->belongsTo('App\User');
    }
}
