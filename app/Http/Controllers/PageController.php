<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
	public function home(){
        $res=Restaurant::all();
        return view('page.Homepage',['all_res'=>$res]);
    }
public function getSearch(Reques $request){
        $restaurant = restaurants::where('name','like','%'.$request->key.'%')
        ->get();
        return view('page.search',compact('restaurant'));
    
    }
}