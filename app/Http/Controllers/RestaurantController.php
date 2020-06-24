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
        $res->duyet = 1;
        $res->rating = 0;

        if ($request->hasFile('store_img')){
            // Lấy  file
            $file = $request->file('store_img');

            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect('signup')->with('thongbao','Chỉ được thêm ảnh dưới dạng đuôi jpg,png hoặc jpeg');
            }
            $name=$file->getClientOriginalName();
            if(!file_exists("upload/restaurant/" .$name))
            $file->move("upload/restaurant",$name);
            $res->picture=$name;

        }
        else
        {
            $res->picture="nhahang_2.jpg";

        }
        $res->save();
        return redirect('home');

    }
     public function getEditRes($id){
        $res = Restaurant::find($id);
        return view('page.editRes',['res'=>$res]);
    }
    public function postEditRes(Request $request,$id){
        echo "Loi";
        /*$res = Restaurant::find($id);
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
        $res->name = $request->name;
        $res->phone = $request->phone;
        $res->address = $request->address;
        $res->menu = $request->menu;
        $res->price = $request->price;
        $res->description = $request->description;

        if ($request->hasFile('avatar')){
            // Lấy  file
            $file = $request->file('avatar');

            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                //return redirect()->back()->with('thongbao','Chỉ được thêm ảnh dưới dạng đuôi jpg,png hoặc jpeg');
            }
            $name=$file->getClientOriginalName();
            if(!file_exists("upload/restaurant/" .$name))
            $file->move("upload/restaurant",$name);
            $res->picture=$name;

        }
     
        $res->save();
        return redirect('home');
        */

    }
    public function getRes($id){
        $Restaurant = Restaurant::find($id);
        return view('page.restaurant',['resRef'=>$Restaurant]);
    }
}