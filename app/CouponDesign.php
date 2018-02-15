<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponDesign extends Model
{
    //

    public function coupons() {
    	return $this->hasMany('App\Coupon');
    }
}
