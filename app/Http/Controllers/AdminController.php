<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Restaurant;


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

    public function getAdminProfile(){
        $res=Restaurant::all();
        return view('page.adminProfile',['all_res'=>$res]);
    }
    public function Verify($id){
        $res = Restaurant::find($id);
        $res->duyet = 1;
        $res->save();

        return redirect()->route('admin');

    }
}
