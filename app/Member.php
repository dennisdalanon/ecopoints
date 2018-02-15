<?php

namespace App;

use App\Coupon;
use App\Member;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
     protected $fillable = [
        'first_name', 'last_name', 'email_address', 'facebook', 'twitter', 'linkedin',
    ];

   // public function getRouteKeyName() {

   // 	return 'nickname';
    	
	//}

    
    public function coupons() {
    	return $this->hasMany('App\Coupon');
    }
    
}
