<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	use SoftDeletes;
    protected $fillable = ['name','email','group_id','confirmed'];
    protected $table = 'members';
    protected $dates = ['deleted_at'];

    public function group(){
    	return $this->belongsTo('App\Group');
    }
}
