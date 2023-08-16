<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Redirect;
use App\Models\Animal;
use App\Models\Adopter;
use App\Models\Category;
use App\Models\Comment;
use Spatie\Searchable\Search;
use Auth;
class MainController extends Controller
{
    //
    public function frontpage()
    {
    		// $animals = DB::table('animals')
      //                 ->join('categories', 'animals.category_id', 'categories.id')
      //                 ->leftJoin('animal_rescuer','animals.id','animal_rescuer.animal_id')
      //                 ->leftJoin('adopter_animal','animals.id','adopter_animal.animal_id')
      //                 ->leftJoin('adopters','adopters.id','adopter_animal.adopter_id')
      //                 ->leftJoin('rescuers','rescuers.id','animal_rescuer.rescuer_id')
      //                 ->select('animals.*','rescuer_fname','rescuer_lname', 'adopter_animal.adopter_id', 'category_name')
      //    			  ->get()->toArray();

      //    	$diseases = DB::table('animals')
      //               ->leftJoin('animal_disease','animals.id', 'animal_disease.animal_id')
      //               ->leftJoin('diseases', 'animal_disease.disease_id', 'diseases.id')
      //               ->select('diseases.disease_name', 'animal_disease.*')->get();
        if(Auth::check() && @auth()->user()->role != "adopter"){
            return redirect()->route('home');
        }
       $animals = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')->get();

        // dd($animals);

        return response()->json(['data'=>$animals]);
         // return view('landingpage.main', compact('animals'));
    }

     public function animal()
    {   
         if(Auth::check() && @auth()->user()->role == "new"){
            return redirect()->route('home');
        }

         if(Auth::check() && @auth()->user()->role == "deactive"){
            return redirect()->route('home');
        }


    	$animals = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')->get();

         return view('landingpage.animal', compact('animals'));
    }

    public function adopted()
    {
         if(Auth::check() && @auth()->user()->role == "new"){
            return redirect()->route('home');
        }

         if(Auth::check() && @auth()->user()->role == "deactive"){
            return redirect()->route('home');
        }

    	$animals = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')->get();
         return view('landingpage.adopted', compact('animals'));
    }




     public function search($term = null)
    {	

    	  // $searchResults = (new Search())
       //     ->registerModel(Animal::class, 'animal_name','id','animal_gender', 'animal_breed')
       //     ->search($request->search);
       //     // dd($searchResults);
       //     // return view('item.search',compact('searchResults'));

       //     return view('search',compact('searchResults'));


        $search = $term;
        if ($search == null) {
            $animals = Animal::orderBy('id','DESC')->get();
        }else{
            $animals = DB::table('animals')
            ->join('categories','categories.id','animals.category_id')
            ->Leftjoin('animal_disease','animal_disease.animal_id','animals.id')
            ->Leftjoin('adopter_animal', 'adopter_animal.animal_id', 'animals.id')
            ->select('animals.*', 'animal_disease.animal_id as animal_disease_id', 'adopter_animal.animal_id as adopter_animal_id')
            // ->where('animal_disease.animal_id',null)
            // ->where('adopter_animal.animal_id',null)
            ->distinct()
            ->orderBy('animal_name','ASC')
            ->orWhere('animal_name', 'like', '%'.$search.'%')
            ->orWhere('category_name', 'like', '%'.$search.'%')
            ->limit(10)->get();
        }


        $response= array();
        $ids = array();
        foreach($animals as $animal){
            if ($animal->animal_disease_id == null && $animal->adopter_animal_id == null) {
                $response[] = array('value'=>$animal->id, 'label' => $animal->animal_name);
                array_push($ids,$animal->id);
            }
           
        }

        $theAnimals = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
                ->with(array('adopters' => function($query) {$query->withTrashed();}))
                ->with(array('rescuers' => function($query) {$query->withTrashed();}))
                ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
                ->whereIn('id', $ids)
                ->orderByRaw(\DB::raw("FIELD(id, ".implode(",",$ids).")"))
                ->with('category')->get();

        $response['ids'] = $ids;
        $response['animals'] = $theAnimals;

        return response()->json($response);
    }



    public function searchclick($id = null){
        $animal = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')
        ->where('animals.id', $id)->first();
        // dd($animal);
        return response()->json(['data'=>$animal]);
    }


    public function ladingView($id){
        $animal = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')
        ->where('id', $id)->first();

         return view('landingpage.view', compact('animal'));
    }

    public function show($id){
         $animal = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with(array('comments' => function($query) {$query->orderBy('id', 'DESC');}))
        ->with('category')
        ->where('animals.id', $id)->first();
        return response()->json($animal);    
        // return View::make('landingpage.show', compact('animal'));
    }



    public function adopting($id)
    {   
       if(!Auth::check()){
            return redirect()->route('login')->with('fail', 'You Need To Login To Adopt Animals');
       }

       if(auth()->user()->role != 'adopter'){
            return redirect()->back();
       }
       // $adopters = DB::table('adopters')->pluck('adopter_lname','id');


       // $animals = DB::table('animals')
       //                ->join('categories', 'animals.category_id', 'categories.id')
       //                ->select('animals.*', 'category_name')
       //                ->where('animals.id','=',$id)->get();

       //  $diseases = DB::table('animals')
       //              ->leftJoin('animal_disease','animals.id', 'animal_disease.animal_id')
       //              ->leftJoin('diseases', 'animal_disease.disease_id', 'diseases.id')
       //              ->select('diseases.*')
       //              ->where('animals.id','=',$id)->get();

       //  $rescuers = DB::table('animals')
       //              ->leftJoin('animal_rescuer','animals.id','animal_rescuer.animal_id')
       //              ->leftJoin('rescuers','animal_rescuer.rescuer_id','rescuers.id')
       //              ->select('rescuers.*')
       //              ->where('animals.id','=',$id)->get();

         $animal = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')
        ->where('animals.id', $id)->first();
        // dd($animal);
        return View::make('landingpage.adopting', compact('animal'));

        // return View::make('landingpage.adopting', compact('animals','adopters','diseases','rescuers',));
    }


  public function adopt(Request $request)
    {
       // if(!Auth::check()){
       //      return redirect()->route('login')->with('fail', 'You Need To Login To Adopt Animals');
       // }

       // if(auth()->user()->role != 'adopter'){
       //      return redirect()->back();
       // }
     
      // $adoptor =  DB::table('adopter_animal')
      //            ->where('animal_id','=',$request->animal_id)->get();

      // if(count($adoptor) == 0){
      //   DB::table('adopter_animal')->insert([
      //               'animal_id' => $request->animal_id,
      //               'adopter_id' => $request->adopter_id
      //           ]);
      // }    
      // else{
      //   $adoptor->update($request->all());
      // }

        // dd($request);
       $adopter = Adopter::where('user_id', $request->adopter_id)
       ->where('is_Guest',null)
       ->first();
       $animal = Animal::where('id',$request->animal_id)->first();

        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');
        $random = rand(100000,999999);

       if($adopter){
        $animal->adopters()->attach($adopter->id, ['created_at'=> null, 'status' => 0,'code' => $random]);
        }else{

            $adopter = new Adopter;
            $adopter->adopter_fname = $request->adopter_fname;
            $adopter->adopter_lname = $request->adopter_lname;
            $adopter->adopter_contact = $request->adopter_contact;
            $adopter->adopter_email = $request->adopter_email;
            $adopter->is_Guest = 1;
            $adopter->save();
            $animal->adopters()->attach($adopter->id, ['created_at'=> null, 'status' => 0, 'code' => $random]);

        }

      return response()->json(['message'=>'Success', 'adopter',  $adopter]);
    }


    public function adoptConfirm($animal_id, $adopter_id, $code){
        
        $animal = Animal::with('adopters')->where('id', $animal_id)->first();
        $animal->adopters()->detach();

        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');
        $animal->adopters()->attach($adopter_id, ['created_at'=> $date, 'status' => 1,'code' => $code]);

        $adoptedConfirm = Animal::with('adopters')
        ->where('id', $animal_id)
        ->first();

        return response()->json($adoptedConfirm);

        // return Redirect::route('adopter.request',['adopter_id' => 0])->with('success','Adopted successfully !!!');

    }

}
