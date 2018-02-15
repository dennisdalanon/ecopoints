<?php

namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    //

     public function coupons() {
    	return $this->hasMany('App\Coupon');
    }   
}
