<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Member;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    //
    public function index() {
    	$coupons = Coupon::all();
        $members = Member::all();
        $ecopoints = Coupon::whereNotNull('project_id')->get();
        return view('coupons.index', compact('members','coupons','ecopoints'));
    }

    public function show(Coupon $coupon) {
        $members = Member::all();
        $coupons = Coupon::all();
    	return view('coupons.show', compact('members','coupons','coupon'));
    }

    public function edit(Coupon $coupon) {
        $coupons = Coupon::all();
        $members = Member::all();
        $projects = Project::pluck('project_name','id');
        $ecopoints = Coupon::whereNotNull('project_id')->get();
        return view('coupons.edit', compact('members','coupon','projects','ecopoints','coupons'));
    }

    public function update(Request $request) {
        $coupon = Coupon::findorFail($request->id);
        $coupons = Coupon::all();
        $members = Member::all();
        $coupon->project_id = $request->project_id;
        $coupon->donated_on = Carbon::now()->toDateTimeString();
        $coupon->save();

        return view('coupons.show', compact('members','coupon','coupons'));
    }

    public function gift(Request $request) {
    	$coupon = App\Coupon::find($request->coupon);
    	$coupon->member_id = $request->member;
    	$coupon->save();
    }
}
