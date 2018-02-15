<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use App\Project;

class Coupon extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
    	'project_id'
    ];

	use FormAccessible;

	public function formCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
    
    /**
	* Get the route key for the model.
 	*
 	* @return string
 	*/
	public function getRouteKeyName() {
    	return 'serial_number';
	}

	/**
	* Coupons belong to Members
	*
	*/
	public function member() {
		return $this->belongsTo('App\Member');
	}

	public function merchant() {
		return $this->belongsTo('App\Merchant');
	}

	public function design() {
		return $this->belongsTo('App\CouponDesign','coupon_design_id');
	}

	public function project() {
		return $this->belongsTo('App\Project');
	}

}
