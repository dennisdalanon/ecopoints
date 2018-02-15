<?php

namespace App\Http\Controllers;
use App\Merchant;
use App\Project;
use App\Coupon;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MerchantsController extends Controller
{
     public function index() {
        $merchants = Merchant::all();
        $projects = Project::all();
        $coupons = Coupon::all();
        return view('merchants.index', compact('merchants', 'coupons', 'projects'));
    }

    public function show(Merchant $merchant) {   
    	$merchants = Merchant::all();
        $projects = Project::all();
        $coupons = Coupon::all();
        $members = Member::all();
        $uniqueprojects = Coupon::select('merchant_id', 'project_id')->distinct('project_id')->get();
        $uniquemembers = Coupon::select('merchant_id', 'member_id')->distinct('member_id')->get();
    	return view('merchants.show', compact('merchant', 'merchants', 'coupons', 'ecopoints', 'uniqueprojects','uniquemembers','projects','members'));
    }



}
