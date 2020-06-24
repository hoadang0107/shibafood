<?php

namespace App\Http\Controllers;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
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
<<<<<<< HEAD

    public function getAdminProfile(){
        $res=Restaurant::all();
        return view('page.adminProfile', ['all_res'=>$res]);
    }

    public function getDelete($id)
    {
        Restaurant::find($id)->delete();
        return redirect('admin')->with('success','Dữ liệu xóa thành công.');
	}
    public function logout(){
    	return view ('adminlogin');
 		
>>>>>>> admin
    }
}
