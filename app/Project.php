<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Project;
use App\Coupon;

class Project extends Model
{
    //
    public function getRouteKeyName() {

    	return 'project_name';
    	//$project_name = 'project_name';
    	//return str_replace(' ', '-', strtolower('project_name'));
	}


    public function coupons() {
    	return $this->hasMany('App\Coupon');
    }    
}
