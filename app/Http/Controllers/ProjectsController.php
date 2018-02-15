<?php
namespace App\Http\Controllers;

use App\Project;
use App\Merchant;
use App\Coupon;
use App\Member;
use App\CouponDesign;
use App\Recipient;
use App\MemberFollowProject;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;
//use Illuminate\Support\Collection;
//use Illuminate\Database\Eloquent\Collection;

class ProjectsController extends Controller
{   

     public function index() {
        $projects = Project::all();
        $merchants = Merchant::all();
        $coupons = Coupon::all();
        $ecopoints = Coupon::whereNotNull('project_id')->get();
        return view('projects.index', compact('projects', 'merchants', 'coupons', 'ecopoints'));
    }

    public function home() {
        $projects = Project::all();
        $merchants = Merchant::all();
        $members = Member::all();
        $coupons = Coupon::all();
        $ecopoints = Coupon::whereNotNull('project_id')->get();
        return view('welcome', compact('projects', 'merchants', 'coupons','ecopoints','members'));
    }

    public function show(Project $project) {    
        $members = Member::all();
        $projects = Project::all();
        $merchants = Merchant::all();
        $followed = MemberFollowProject::where('project_id', $project->id)->first();
        $coupons = DB::table('coupons')->orderBy('donated_on', 'desc')->get();
        $coupondesigns = CouponDesign::all();
        $uniquemerchants = Coupon::select('merchant_id', 'project_id')->distinct('merchant_id')->get();
        $donatemerchants = Coupon::select('merchant_id', 'member_id','project_id')->distinct('merchant_id')->get();
        $ecopoints = Coupon::whereNotNull('project_id')->get();
        $recipients = Recipient::all();
    	return view('projects.show', compact('project','projects','coupondesigns','merchants', 'coupons', 'ecopoints', 'uniquemerchants','donatemerchants','members', 'recipients', 'followed'));
    }   
}
