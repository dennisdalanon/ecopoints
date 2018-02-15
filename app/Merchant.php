<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Merchant;
use App\Coupon;

class Merchant extends Model
{

	//
    public function getRouteKeyName() {

    	$name = 'merchant_name';

    	return $name;
	}

    //

    public function coupons() {
    	return $this->hasMany('App\Coupon');
    }
}
