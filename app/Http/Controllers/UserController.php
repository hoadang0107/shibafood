<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\User;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Restaurant;



class UserController extends Controller
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public  function getDanhSach()
	{
		$user = User::all();
		return;
	}

	public function getSignup(){
		return view('page.signup');
	}
	public function getLogin(){
		return view('page.signin');
	}
	public function getLogout(){
		Auth::logout();
		return redirect('home');
	}
	public function postSignup(Request $request){
		$this->validate($request,
			[
				'name' => 'required|min:3',
				'email' => 'required|email|unique:users,email',
				'password' => 'required| min:6|max:32',
				'passwordAgain' => 'required|same:password',
				'file' => 'image|max:2028'
			],
			[
				'name.required' => 'Bạn chưa nhập tên người dùng',
				'name.min' => 'tên người dùng phải ít nhất 3 kí tự',
				'email.required'=> 'Bạn chưa nhập email',
				'email.email'=>'bạn chưa nhập đúng định dạng email',
				'email.unique'=>'Email đã tồn tại',
				'password.required'=>'Bạn chưa nhập mật khẩu',
				'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
				'password.max'=>'Mật khẩu có nhiều nhất 32 kí tự',
				'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
				'passwordAgain.same'=>'Mật khẩu chưa khớp',
				'file.image' => 'Định dạng không cho phép',
            	'file.max' => 'Kích thước file quá lớn'

			]);
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->quyen = 0;
		if ($request->hasFile('avatar')){
            // Lấy  file
            $file = $request->file('avatar');

            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect('signup')->with('thongbao','Chỉ được thêm ảnh dưới dạng đuôi jpg,png hoặc jpeg');
            }
            $name=$file->getClientOriginalName();
            if(!file_exists("upload/user/" .$name))
            $file->move("upload/user",$name);
            $user->avatar=$name;
        }
        else
        {
            $user->avatar="avatar_2x.png";

        }
		$isSuccess = $user->save();
		if ($isSuccess) {
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				return redirect('home');
			} else {
				return redirect('login');
			}
		} else {
			return redirect('signup')->with('thongbao', 'Đăng ký thất bại');
		}

	}
	public function postLogin(Request $request){
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required|min:6|max:32'
		], [
			'email.required' => 'Bạn chưa nhập Email',
			'password.required' => 'Bạn chưa nhập mật khẩu',
			'password.min' => 'Mật khẩu tối thiểu 6 ký tự và không chứa khoảng trắng',
			'password.max' => 'Mật khẩu tối đa 32 ký tự'
		]);
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			if(Auth::user()->quyen ==1)
			return redirect('admin');
			else return redirect('home');
		} else {
			return redirect('login')->with('thongbao', 'Tài khoản hoặc mật khẩu chưa chính xác');
		}
	}

	public function getProfile(){
		$user = Auth::user();
		return view('page.profile1',['user'=>$user]);
	}

	public function postProfile(Request $request){

		$this->validate($request,
			[
				'name' => 'required|min:3'

			],
			[
				'name.required' => 'Bạn chưa nhập tên người dùng',
				'name.min' => 'tên người dùng phải ít nhất 3 kí tự',

			]);
		$user = Auth::user();
		$user->name = $request->name;
		if ($request->hasFile('avatar')){
            // Lấy  file
            $file = $request->file('avatar');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect('signup')->with('thongbao','Chỉ được thêm ảnh dưới dạng đuôi jpg,png hoặc jpeg');
            }
            $name=$file->getClientOriginalName();

            if(!file_exists("upload/user/" .$name))
            $file->move("upload/user",$name);
            $user->avatar=$name;

        }
       
		print_r($request->changePassword);
        if ($request->changePassword == "on") {
            $this->validate($request,
                [
                    'password' => 'required| min:6|max:32',
                    'passwordAgain' => 'required|same:password'
                ],
                [

                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                    'password.max' => 'Mật khẩu có nhiều nhất 32 kí tự',
                    'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same' => 'Mật khẩu chưa khớp'

                ]);
            $user->password = bcrypt($request->password);
        }
		
		$user->save();

		return redirect('profile')->with('thongbao', 'Thay đổi thành công');
		
	}


	public function getListRes(){
		$user = Auth::user();
		$restaurant = Restaurant::where('userID', $user->id)->get();
		return view('page.resList',['restaurant'=>$restaurant]);
	}


	
}
