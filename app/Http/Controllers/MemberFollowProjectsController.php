<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
use Illuminate\Http\Request;
use App\MemberFollowProject;
use Carbon\Carbon;
use DB;

class MemberFollowProjectsController extends Controller
{
    //

     public function follow(Request $request) {   
      $member = $request->input('member');
  	  $project = $request->input('project');
      DB::insert('insert into member_follow_projects (member_id,project_id) values(?,?)',[$member,$project]);
      //echo "Record inserted successfully.<br/>";
      //echo '<a href = "/home">Click Here</a> to go back.';      
    }

     public function unfollow(Request $request) {   
      $member = $request->input('member');
  	  $project = $request->input('project');
      DB::table('member_follow_projects')->where(['member_id'=>$member, 'project_id'=>$project])->delete();
    }

}
