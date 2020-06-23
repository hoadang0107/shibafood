<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Restaurant;


class RestaurantController extends Controller
{
    //

    public function getList(){
    	$res = Restaurant::all();
    	return view('page.Homepage',['all_res'=>$res]);
    }
    public function getAddRes(){
        $res = Restaurant::all();
    	return view('page.addStore');
    }
    public function postAddRes(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100|unique:Restaurants,name'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên thể loại',
                'name.unique'=>'Tên nhà hàng đã tồn tại',
                'name.min'=>'Tên nhà hàng phải có độ dài từ 3 đến 100 kí tự',
                'name.max'=>'Tên nhà hàng phải có độ dài từ 3 đến 100 kí tự'
            ]);

        $res = new Restaurant;
        $res->name = $request->name;
        $res->phone = $request->phone;
        $res->userID = Auth::user()->id;
        $res->address = $request->address;
        $res->menu = $request->menu;
        $res->price = $request->price;
        $res->description = $request->description;
        $res->picture = $request->store_img;
        $res->duyet = 1;
        $res->rating = 0;
        $res->save();
        return redirect('addRes')->with('thongbao','Thêm thành công');

    }
    public function getRes($id){
        $Restaurant = Restaurant::find($id);
        return view('page.restaurant',['resRef'=>$Restaurant]);
    }
}