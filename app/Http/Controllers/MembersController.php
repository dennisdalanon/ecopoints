<?php

namespace App\Http\Controllers;
use App\User;
use App\Member;
use App\Coupon;
use Validator;
use Redirect;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    //
    public function index() {
    	$members = Member::all();
        $coupons = Coupon::all();
        $ecopoints = Coupon::whereNotNull('project_id')->get();
        return view('members.index', compact('members', 'coupons','ecopoints'));
    }

    public function show(Member $member) {
        // DD added to retreive data on members show template
        $members = Member::all();
        $coupons = Coupon::all();
    	return view('members.show', compact('members','coupons','member'));
    }

    public function edit(Member $member) {
        $members = Member::all();
        $coupons = Coupon::all();
        $ecopoints = Coupon::whereNotNull('project_id')->get();
        return view('members.edit', compact('member', 'ecopoints','coupons','members'));
    }

    public function disable(Member $member) {
        
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
    $member = Member::findOrFail($id);
    $member->first_name = $request->input('first_name');
    $member->last_name = $request->input('last_name');
    $member->facebook = $request->input('facebook');
    $member->twitter = $request->input('twitter');
    $member->linkedin = $request->input('linkedin');
    $member->save();

    $user = User::findOrFail($id);
    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
    $user->save();

    return Redirect::route('members.index');
    }

    public function member() {
        $members = Member::all();
        return view('welcome', compact('members'));
    }
}
