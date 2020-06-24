<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Comment;
use App\Restaurant;
use App\User;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    //

    public function getListCmt($id){
        $cmt = DB::table('comments')
                ->leftJoin('restaurants','comments.resID', '=', "restaurants.id")
                ->get();
    	return view('page.restaurant',['all_cmt'=>$cmt]);
    }
    public function getAddCmt($id){
        $resId = $id;
        $comment = Comment::all();
        $restaurant = Restaurant::find($id);
    	return view("../restaurant/$id/");
    }
    public function postAddCmt($id, Request $request){
        $this->validate($request,
        [
            'intent' => 'required'
        ],
        [
            'intent.required'=>'Bạn không được để trống comment',
        ]);
        $resId = $id;
        $restaurant = Restaurant::find($id);
        $comment = new Comment;
        $comment -> resId = $resId;
        $comment -> intent = $request->intent;
        $comment -> userID = Auth::user()->id;
        $comment-> save();
        return redirect("../restaurant/$id/");

    }
     public function getEditCmt($id){
        $res = Restaurant::find($id);
        return view('page.editRes',['res'=>$res]);
    }
    public function postEditCmt(Request $request,$id){
        $res = Restaurant::find($id);
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
     
        $res->save();
        return redirect('home');

    }
    public function getCmt($id){
        $Restaurant = Restaurant::find($id);
        return view('page.restaurant',['resRef'=>$Restaurant]);
    }
    public function getUser($id){
        $cmt = DB::table('comments')
                ->leftJoin('restaurants','comments.resID', '=', "restaurants.id")
                ->get();
        foreach ($comments as $comment) {
            $commenter = User::where('id', $comment->user_id)->first();                }
        return view('page.restaurant',['resRef'=>$Restaurant,'all_cmt'=>$cmt]);
    }
}