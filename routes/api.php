<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/animal/restore/{id}',['uses' => 'AnimalController@restore', 'as'=> 'animal.restore']);
Route::get('/rescuer/restore/{id}',['uses' => 'RescuerController@restore', 'as'=> 'rescuer.restore']);
Route::get('/adopter/restore/{id}',['uses' => 'AdopterController@restore', 'as'=> 'adopter.restore']);
Route::get('/veterinarian/restore/{id}',['uses' => 'VeterinarianController@restore', 'as'=> 'veterinarian.restore']);
Route::get('/disease/restore/{id}',['uses' => 'DiseaseController@restore', 'as'=> 'disease.restore']);
Route::get('/user/restore/{id}',['uses' => 'UserController@restore', 'as'=> 'user.restore']);


Route::post('/create',['uses' => 'AuthController@create' , 'as'=>'auth.create']);

Route::post('/check/user',['uses' => 'AuthController@check' , 'as'=>'check']);

Route::get('/frontpage',['uses' => 'MainController@frontpage' , 'as'=>'frontpage']);


Route::get('/search/{term?}',['uses' => 'MainController@search', 'as'=> 'search']);

Route::get('/searchreq/{term?}',['uses' => 'AdopterController@searchreq', 'as'=> 'searchreq']);


Route::get('/search/click/{id?}',['uses' => 'MainController@searchclick', 'as'=> 'searchclick']);

Route::get('/searchreq/click/{id?}',['uses' => 'AdopterController@searchreqclick', 'as'=> 'searchreqclick']);


Route::get('/main/show/{id}',['uses' => 'MainController@show', 'as'=> 'landing.show']);


Route::post('/main/adopt',['uses' => 'MainController@adopt', 'as'=> 'adopt']);

Route::get('/adopter/request/{info?}',['uses' => 'AdopterController@request', 'as'=> 'adopter.request']);


Route::get('/adopt/confirm/{animal_id}/{adopter_id}/{code}',['uses' => 'MainController@adoptConfirm', 'as'=> 'adopt.confirm']);



Route::resource('comment', 'CommentController');

Route::group(['middleware' => 'auth:sanctum'], function(){

	Route::get('/dashboard/index',['uses' => 'DashboardController@index' , 'as'=>'dashboard.index']);
	
	Route::get('/dashboard/adjustRescued/{date}',['uses' => 'DashboardController@adjustRescued' , 'as'=>'dashboard.adjustRescued']);


	Route::get('/dashboard/adjustAdopted/{date}',['uses' => 'DashboardController@adjustAdopted' , 'as'=>'dashboard.adjustAdopted']);

	Route::get('/logout/{user_id}',['uses' => 'AuthController@logout' , 'as'=>'logout']);
	
	Route::resource('animal', 'AnimalController');
	Route::resource('rescuer', 'RescuerController');
	Route::resource('adopter', 'AdopterController');
	Route::resource('veterinarian', 'VeterinarianController');
	Route::resource('disease', 'DiseaseController');
	Route::resource('user', 'UserController');
});




    

