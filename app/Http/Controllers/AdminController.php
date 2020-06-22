<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function index(){
    	return view('adminlogin');
    }
    public function showDashboard(){
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
 		$adminemail = $request->adminemail;
 		$adminpassword = md5($request->adminpassword);
 		$result = DB::table('tbl_admin')->where('adminemail',$adminemail)->where('adminpassword',$adminpassword)->first();
 		return view ('admin.dashboard');
    }
}
