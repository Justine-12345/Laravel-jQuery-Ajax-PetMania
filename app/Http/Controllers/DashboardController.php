<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\AnimalAdoptedChart;
use App\Charts\AnimalRescuedChart;
use App\Charts\CommonDiseaseChart;
use App\Models\Animal;
use App\Models\Disease;
use App\Models\User;
use DB;
use Auth;
class DashboardController extends Controller
{
    //

    public function index(){

        // if(!Auth::check()){
        //     return redirect()->back();
        // }
        
        // if(Auth::check() && auth()->user()->role != "admin"){
        //     return Redirect::route('home');
        // }

       

        session()->put('cur_tab', 'dashboard');

        // $animalAdopted = DB::table('adopter_animal')
        // ->selectRaw('COUNT(animal_id) as adopted, MONTHNAME(created_at) as month')
        // ->groupBy('month')
        // ->orderBy('month','desc')
        // ->limit(12)
        // ->pluck('month','adopted')->all();

        $animalAdopted = DB::table('adopter_animal')
        ->where('created_at','!=',null)
        ->selectRaw('MONTHNAME(created_at) as month, COUNT(animal_id) as adopted')
        ->groupBy('month')
        ->orderBy('created_at', 'asc')
        ->get();


        $animalRescued = Animal::selectRaw('COUNT(id) as rescued, MONTHNAME(created_at) as month')
        ->groupBy('month')
        ->orderBy('created_at', 'asc')
        ->get();

    // $user = User::where('id',44)->first();
    // $user->tokens()->delete();

        return response()->json(['animalAdopted'=>$animalAdopted, 'animalRescued'=> $animalRescued]);

            // return view('dashboard.index', compact());
    }



    public function adjustAdopted($date){
        $dates = explode(",", $date);

       
        $from = $dates[0];
        $to = $dates[1];

         $animalAdopted = DB::table('adopter_animal')
        ->selectRaw('MONTHNAME(created_at) as month, COUNT(animal_id) as adopted')
        ->whereBetween('created_at', [$from, $to])
        ->orderBy('created_at', 'asc')
        ->groupBy('month')
        ->get();

         return response()->json($animalAdopted);
    }


     public function adjustRescued($date){
        $dates = explode(",", $date);

       
        $from = $dates[0];
        $to = $dates[1];

        $animalRescued = Animal::selectRaw('COUNT(id) as rescued, MONTHNAME(created_at) as month')
        ->whereBetween('created_at', [$from, $to])
        ->groupBy('month')
        ->orderBy('created_at', 'asc')
        ->get();

         return response()->json($animalRescued);
    }



}
