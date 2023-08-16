<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RescuerController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
use App\Models\Animal;
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








// Route::get('/try', function () {
//    $animal= Animal::with('diseases')->get();
//    dd($animal);
// });

// Route::get('/dashboard/index/',['uses' => 'DashboardController@index' , 'as'=>'dashboard.index']);
Route::view('/','lobby');
Route::view('/index/','dashboard.index');





// Route::get('/',['uses' => 'MainController@frontpage' , 'as'=>'frontpage']);
Route::get('/login',['uses' => 'AuthController@login' , 'as'=>'login'])->middleware('guest');
Route::get('/register',['uses' => 'AuthController@register' , 'as'=>'register'])->middleware('guest');


Route::get('/home',['uses' => 'AuthController@home' , 'as'=>'home'])->middleware('role:new,rescuer,veterinarian,adopter,admin,deactive');

Route::get('/waiting',['uses' => 'AuthController@waiting' , 'as'=>'waiting'])->middleware('verified');

Route::get('/deactive',['uses' => 'AuthController@deactive' , 'as'=>'deactive'])->middleware('verified');

Route::post('/check',['uses' => 'AuthController@check' , 'as'=>'check']);
Route::get('/validate_email/{remember_token}',['uses' => 'AuthController@validateEmail' , 'as'=>'validate.email']);


Route::group(['middleware' => 'role:admin'], function() {

Route::get('/adopt/confirm/{animal_id}/{adopter_id}',['uses' => 'MainController@adoptConfirm', 'as'=> 'adopt.confirm']);
});

Route::group(['middleware' => 'role:rescuer,admin'], function() {
	Route::resource('rescuer', 'RescuerController'); 
	Route::get('/rescuer/restore/{id}',['uses' => 'RescuerController@restore', 'as'=> 'rescuer.restore']);
});


Route::group(['middleware' => 'role:veterinarian,admin'], function() {
	Route::resource('veterinarian', 'VeterinarianController'); 
	Route::get('/veterinarian/restore/{id}',['uses' => 'VeterinarianController@restore', 'as'=> 'veterinarian.restore']);
});

Route::group(['middleware' => 'role:adopter,admin'], function() {
	Route::resource('adopter', 'AdopterController');
	Route::get('/adopter/restore/{id}',['uses' => 'AdopterController@restore', 'as'=> 'adopter.restore']);
	Route::get('/adopter/request/{adopter_id?}',['uses' => 'AdopterController@request', 'as'=> 'adopter.request'])->middleware('role:adopter,admin');
});


		
Route::group(['middleware' => 'role:admin'], function() {

	Route::resource('animal', 'AnimalController');
	Route::get('/animal/restore/{id}',['uses' => 'AnimalController@restore', 'as'=> 'animal.restore']);

	Route::resource('user', 'UserController');
	Route::get('/user/restore/{id}',['uses' => 'UserController@restore', 'as'=> 'user.restore']);

	Route::resource('disease', 'DiseaseController');
	Route::get('/disease/restore/{id}',['uses' => 'DiseaseController@restore', 'as'=> 'disease.restore']);

	Route::post('/user/import/',['uses' => 'UserController@import', 'as'=> 'user.import']);
	Route::post('/animal/import/',['uses' => 'AnimalController@import', 'as'=> 'animal.import']);
});


Route::resource('message', 'MessageController');


// Route::group(['middleware' => 'role:adopter'], function() {
	Route::post('/main/adopt',['uses' => 'MainController@adopt', 'as'=> 'adopt']);
// });

Route::get('/main/adopting/{id}',['uses' => 'MainController@adopting', 'as'=> 'adopting']);

Route::get('/main/adopted',['uses' => 'MainController@adopted' , 'as'=>'adopted']);

Route::post('/search',['uses' => 'MainController@search', 'as'=> 'search']);

Route::get('/main/animal',['uses' => 'MainController@animal', 'as'=> 'animal']);


Route::get('/main/view/{id}',['uses' => 'MainController@ladingView', 'as'=> 'landing.view']);
Route::get('/main/show/{id}',['uses' => 'MainController@show', 'as'=> 'landing.show']);


 Auth::routes(['verify'=> true]);






Route::post('/create',['uses' => 'AuthController@create' , 'as'=>'auth.create']);
Route::post('/reset_password',['uses' => 'AuthController@resetpassword' , 'as'=>'resetpassword']);
Route::get('/forgot_password',['uses' => 'AuthController@forgot' , 'as'=>'forgot']);
Route::post('/forgot_password',['uses' => 'AuthController@password' , 'as'=>'password']);
Route::get('/resetPassword',['uses' => 'AuthController@resetPassword' , 'as'=>'resetPassword']);
Route::get('/confirm_password/{token?}/{email?}', function($token = " " , $email = " "){
$data['token'] = $token;
$data['email'] = $email;
return View::make('auth.passwords.reset',$data);
});


Route::group(['middleware'=>['auth']], function(){
Route::get('/logout',['uses' => 'AuthController@logout' , 'as'=>'logout']);
// Route::get('/adopter/restore/{id}',['uses' => 'AdopterController@restore', 'as'=> 'adopter.restore']);
});



//**************************************

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

?>

