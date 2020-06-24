<?php

namespace App\Http\Controllers;
use App\Restaurant;
use App\User;
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




    public function getAdminProfile(){
        $res=Restaurant::all();
        $user = User::all();
        return view('page.adminProfile', ['all_res'=>$res], ['all_user'=>$user]);

    }

    public function getDelete($id)
    {
        Restaurant::find($id)->delete();
        return redirect('admin')->with('success','Dữ liệu xóa thành công.');
	}
    public function logout(){
    	return view ('adminlogin');
    }

    public function getDeleteUser($id){
        User::find($id)->delete();
        return redirect('admin')->with('success','Dữ liệu xóa thành công.');
    }
    public function Verify($id){
        $res = Restaurant::find($id);
        $res->duyet = 1;
        $res->save();

        return redirect()->route('admin');

    }

}
