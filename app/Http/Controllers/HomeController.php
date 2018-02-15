<?php

namespace App\Http\Controllers;
use App\User;
use App\Member;
use App\Coupon;
use App\Project;
use App\CouponDesign;
//use Illuminate\Http\Request;

use Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        $projects = Project::all();
        $coupons = Coupon::all();
        $coupondesigns = CouponDesign::all();
        $ecopoints = Coupon::whereNotNull('project_id')->get();
        return view('home', compact('members','projects','coupons','coupondesigns', 'ecopoints'));


    }  


}
