<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rescuer;
use App\Models\Adopter;
use App\Models\Veterinarian;
use App\Models\User;
use App\Models\Animal;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\DataTables\AdoptersDataTable;
use File;
use View;
use Redirect;

class AdopterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdoptersDataTable $dataTable)
    {
        //
        // if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        // session()->put('cur_tab', 'adopters');
        // return $dataTable->render('adopter.index');
         $adopters = Adopter::OrderBy('id','desc')->where('deleted_at',null)->where('is_Guest',null)->get();
         
        return response()->json(['data'=>$adopters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->role != "admin"){
            return redirect()->back();
        }
         return View::make('adopter.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          // dd($request);
        // if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        //
         $input = $request->all();
         // dd($input);
        
        if($request->hasFile('adopter_pic'))
        {
            $rescuer_image = $request->file('adopter_pic')->getClientOriginalName();
            $t=time();
            $request->file('adopter_pic')->storeAs('public/images', $t."-".$rescuer_image);
            $input['user_picture'] = '/storage/images/'. $t."-".$rescuer_image;
        }
         
        $input['role'] = "adopter";
        $user = User::create([
        'user_fname' => $input['adopter_fname'],
        'user_lname' => $input['adopter_lname'],
        'user_age' => $input['adopter_age'],
        'user_contact' => $input['adopter_contact'],
        'user_address' => $input['adopter_address'],
        'user_gender' => $input['adopter_gender'],
        'user_picture' => $input['user_picture'],
        'role' => $input['role'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $input['user_id'] = $user->id;

        $adoper = Adopter::create($input);

        $newAdopter = Adopter::where('id', $adoper->id)
        ->select('user_id','adopter_fname', 'adopter_lname', 'adopter_age', 'adopter_contact', 'adopter_address', 'adopter_gender')
        ->first();
        
        return response()->json($newAdopter);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         // $animals = DB::table('animals')
         //              ->join('adopter_animal', 'adopter_animal.animal_id', 'animals.id')
         //              ->join('categories', 'categories.id', 'animals.category_id')
         //              ->select('animals.*', 'adopter_animal.adopter_id', 'category_name')
         //              ->where('adopter_animal.adopter_id','=',$id)->get()->toArray();
  
         //  $adopters = DB::table('adopters')->where('id',"=",$id)->get()->toArray();
         //  return View::make('adopter.show', compact('adopters', 'animals'));

        //   if(auth()->user()->role == "admin" || auth()->user()->id == $id){
        // $categories = Category::all();
        // $adopter = Adopter::with('animals')->with('user')->where('user_id', $id)->first();
        //       return View::make('adopter.show', compact('categories','adopter'));
        // }
        // else{
        //     return redirect()->back();
        // }
        $adopter = Adopter::with('animals')->with('user')->where('user_id', $id)->first();
         return response()->json($adopter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //
       // if(auth()->user()->role == "admin" || auth()->user()->id == $id){
       //  $adopter = Adopter::with('user')->where('user_id', $id)->first();
       //  return View::make('adopter.edit', compact('adopter'));
       // }
       // else{
       //      return redirect()->back();
       //  }
        $adopter = Adopter::with('user')->where('user_id', $id)->first();
        return response()->json($adopter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
        $input = $request->all();
    //  if($request->password != null){
       
    //      $rules = [
    //         'adopter_fname' => 'required|max:60',
    //         'adopter_lname' => 'required',
    //         'adopter_age' => 'required|numeric',
    //         'adopter_contact' => 'required|numeric',
    //         'adopter_address' => 'required',
    //         'adopter_gender' => 'required',
    //         'user_picture'=> 'nullable|image',
    //         'current_password' => 'required',
    //         'password' =>'string|min:8|confirmed',
    //     ];
    // }
    // else{
    //       $rules = [
    //         'adopter_fname' => 'required|max:60',
    //         'adopter_lname' => 'required',
    //         'adopter_age' => 'required|numeric',
    //         'adopter_contact' => 'required|numeric',
    //         'adopter_address' => 'required',
    //         'adopter_gender' => 'required',
    //         'user_picture'=> 'nullable|image',
    //     ];

    // }

// $validator = Validator::make($request->all(), $rules);



// if($validator->passes())
// {         
    if($request->password != null){
    $user = User::where('id','=',$id)
        ->select('id','password')->first();
    if(!Hash::check($request->current_password,$user->password)){
                return redirect()->back()->with('success', 'Wrong Current Password');
    }
    }


        if($request->hasFile('user_picture'))
        {

            File::delete($input['old_user_picture']);

            $rescuer_image = $request->file('user_picture')->getClientOriginalName();
            $t=time();
            $request->file('user_picture')->storeAs('public/images', $t."-".$rescuer_image);
            $input['user_picture'] = '/storage/images/'. $t."-".$rescuer_image;

            // $rescuer = Rescuer::find($id);
            // $rescuer->update($input);
        }   
        $transfer = 0;
        $input['user_id'] = $id;
        $adopter = Adopter::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();

         if($request->role == "adopter"){
             $adopter->update($input);
        }


         if($request->role == "rescuer"){
             $transfer =+ 1;
            $adopter->delete();
             
            $rescuer = Rescuer::withTrashed()->where('user_id', $id)->first();
            if($rescuer == null){
                $rescuer = new Rescuer;
                $rescuer->rescuer_fname = $request->adopter_fname;
                $rescuer->rescuer_lname = $request->adopter_lname;
                $rescuer->rescuer_age = $request->adopter_age;
                $rescuer->rescuer_contact = $request->adopter_contact;
                $rescuer->rescuer_address = $request->adopter_address;
                $rescuer->rescuer_gender = $request->adopter_gender;
                $rescuer->user_id = $input['user_id'];
                $rescuer->save();
                }
            else{
                $rescuer->restore();
            }
        }

        if($request->role == "veterinarian"){
             $transfer =+ 1;
            $adopter->delete();
            $veterinarian = Veterinarian::withTrashed()->where('user_id', $id)->first();
            if($veterinarian == null){
                $veterinarian = new Veterinarian;
                $veterinarian->veterinarian_fname = $request->adopter_fname;
                $veterinarian->veterinarian_lname = $request->adopter_lname;
                $veterinarian->veterinarian_age = $request->adopter_age;
                $veterinarian->veterinarian_contact = $request->adopter_contact;
                $veterinarian->veterinarian_address = $request->adopter_address;
                $veterinarian->veterinarian_gender = $request->adopter_gender;
                $veterinarian->user_id = $input['user_id'];
                $veterinarian->save();
                }
            else{
                $veterinarian->restore();
            }
        }

        if($request->role == "admin"){
                $transfer =+ 1;
                $rescuer->delete();
            }

        $user->user_fname = $request->adopter_fname;
        $user->user_lname = $request->adopter_lname;
        $user->user_age = $request->adopter_age;
        $user->user_contact = $request->adopter_contact;
        $user->user_address = $request->adopter_address;
        $user->user_gender = $request->adopter_gender;
        $user->role = $request->role;
             if($request->hasFile('user_picture'))
            {

            $user->user_picture = $input['user_picture'];
             }   

              if($request->password != null)
            {
            $user->password =  Hash::make($request->password);
             }  

        $user->save();
      

// }      
// else
// {
     if ($transfer <= 0) {
            // code...
        $adopter = Adopter::with('user')->where('user_id', $id)->first();
        return response()->json($adopter);
        }
        else{
            return response()->json('transfer');
        }
// }   
//     if(auth()->user()->role == "admin"){
//        if(session()->get('cur_tab') == "home"){ 
//             return Redirect::route('user.index')->with('success', 'Rescuer is Updated Successfully');
//         }else{
//             return Redirect::route('adopter.index')->with('success', 'The Account is Updated  !!!');
//         }

//     }else{
//      return Redirect::route('adopter.show',$id)->with('success', 'Adopter is Updated');
//     }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        //   }
       $adopter = Adopter::where('user_id',$id);
       $user = User::where('id',$id);
       $adopter->delete();
       $user->delete();
       return response()->json(['status'=>200]);
       // if(session()->get('cur_tab') == "home"){
       //  return Redirect::route('user.index')->with('success', 'The Account is deleted  !!!');
       // }else{
       //   return Redirect::route('adopter.index')->with('success', 'The Account is deleted  !!!');
       // }

    }

      public function restore($id)
    {   
         if(auth()->user()->role != "admin"){
            return redirect()->back();
        }
        Adopter::withTrashed()->where('user_id', $id)->restore();
         if(session()->get('cur_tab') == "home"){
             return Redirect::route('user.index')->with('success', 'The Account is restored !!!');
         }else{
              return Redirect::route('adopter.index')->with('success', 'The Account is restored  !!!');
         }
    }


    public function request($info = null){
         // dd($adopter_id);
        // session()->put('cur_tab', 'request');
        //  if(auth()->user()->role == "admin" || auth()->user()->id == $adopter_id){
                $newInfo = explode(",", $info);
                $role = $newInfo[0];
                $id = $newInfo[1];

                if($role == 'admin'){
                    $adopted = Animal::with('adopters')->get();
                    // return view('dashboard.request', compact('adopters'));
                }
                elseif($role == 'adopter'){
                    $adopted = Adopter::with('animals')->where('user_id', $id)->first();
                    // return view('adopter.request', compact('adopter'));
                }
                return response()->json($adopted);
         // }
         // else{
         //    return redirect()->back();
         // }
    }

    public function searchreq($term = null){
        $search = $term;

         $animals = DB::table('animals')
            ->join('categories','categories.id','animals.category_id')
            ->Leftjoin('animal_disease','animal_disease.animal_id','animals.id')
            ->Leftjoin('adopter_animal', 'adopter_animal.animal_id', 'animals.id')
            ->Leftjoin('adopters', 'adopter_animal.adopter_id', 'adopters.id')
            ->select('animals.*', 'animal_disease.animal_id as animal_disease_id', 'adopter_animal.animal_id as adopter_animal_id','code', 'adopter_fname', 'adopter_lname','adopter_contact','status')
            // ->where('animal_disease.animal_id',null)
            // ->where('adopter_animal.animal_id',null)
            ->distinct()
            ->orderBy('animal_name','ASC')
            ->orWhere('code', 'like', '%'.$search.'%')
            ->orWhere('animal_name', 'like', '%'.$search.'%')
            ->orWhere('category_name', 'like', '%'.$search.'%')
            ->limit(10)->get();
             // return response()->json($animals);

        $response= array();
        $ids = array();

        foreach($animals as $animal){
            if ($animal->adopter_animal_id != null) {
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

    public function searchreqclick($id = null){
        $animal = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')
        ->where('animals.id', $id)->first();
        // dd($animal);
        return response()->json($animal);
    }


}
