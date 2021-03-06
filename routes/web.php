<?php

use Illuminate\Support\Facades\Route;
use App\Restaurant;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('home', 'PageController@home');

Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');
Route::get('signup', 'UserController@getSignup');
Route::post('signup', 'UserController@postSignup');
Route::get('logout', 'UserController@getLogout');

Route::post('addRes', 'RestaurantController@postAddRes');
Route::get('addRes', 'RestaurantController@getAddRes');
Route::get('restaurant/{id}',[
'as'=>'Res_detail',
'uses'=>'RestaurantController@getRes'
]);

Route::post('comment/{id}','CommentController@postAddCmt'); 
Route::get('comment/{id}','CommentController@getAddCmt'); 

Route::post('restaurant/{id}/comment','CommentController@postComment');

Route::post('editRes/{id}', 'RestaurantController@postEditRes');
Route::get('editRes/{id}', 'RestaurantController@getEditRes');

Route::get('profile', 'UserController@getProfile');
Route::post('profile', 'UserController@postProfile');

Route::get('admin', 'AdminController@getAdminProfile');
Route::get('admin/delete/{id}', 'AdminController@getDelete');
Route::get('admin/deleteUser/{id}', 'AdminController@getDeleteUser');
Route::get('admin',[
'as'=>'admin',
'uses'=>'AdminController@getAdminProfile'
]);

Route::get('dashboard', 'AdminController@showDashboard');
Route::post('admindashboard', 'AdminController@dashboard');
Route::get('/Verify/{id}', 'AdminController@Verify');

Route::get('search',[
'as'=>'search',
'uses'=>'PageController@getSearch'
]);

Route::get('listRestaurant','UserController@getListRes');
