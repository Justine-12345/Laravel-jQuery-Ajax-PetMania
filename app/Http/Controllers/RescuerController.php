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
use App\DataTables\RescuersDataTable;
use File;
use View;
use Redirect;



class RescuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RescuersDataTable $dataTable)
    {
        //
        // if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        // session()->put('cur_tab', 'rescuers');
        // return $dataTable->render('rescuer.index');
        $rescuers = Rescuer::OrderBy('id','desc')->where('deleted_at',null)->where('is_Add',null)->get();
        return response()->json(['data'=>$rescuers]);
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

        return View::make('rescuer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
         // dd($request);
        // if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        //
         $input = $request->all();
        if($request->hasFile('rescuer_pic'))
        {
            $rescuer_image = $request->file('rescuer_pic')->getClientOriginalName();
            $t=time();
            $request->file('rescuer_pic')->storeAs('public/images', $t."-".$rescuer_image);
            $input['user_picture'] = '/storage/images/'. $t."-".$rescuer_image;
        }
         
        $input['role'] = "rescuer";
        $user = User::create([
        'user_fname' => $input['rescuer_fname'],
        'user_lname' => $input['rescuer_lname'],
        'user_age' => $input['rescuer_age'],
        'user_contact' => $input['rescuer_contact'],
        'user_address' => $input['rescuer_address'],
        'user_gender' => $input['rescuer_gender'],
        'user_picture' => $input['user_picture'],
        'role' => $input['role'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $input['user_id'] = $user->id;

        $rescuer = Rescuer::create($input);

        $newRescuer = Rescuer::where('id', $rescuer->id)
        ->select('user_id','rescuer_fname', 'rescuer_lname', 'rescuer_age', 'rescuer_contact', 'rescuer_address', 'rescuer_gender')
        ->first();
        return response()->json($newRescuer);
     
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
         //              ->join('animal_rescuer', 'animal_rescuer.animal_id', 'animals.id')
         //              ->join('categories', 'categories.id', 'animals.category_id')
         //              ->select('animals.*', 'animal_rescuer.rescuer_id', 'category_name')
         //              ->where('animal_rescuer.rescuer_id','=',$id)->get()->toArray();

         // $rescuers = DB::table('rescuers')->where('user_id',"=",$id)->get();


        // $all_animals = Animal::with('rescuers')
        //                ->with('category');
        //     t           ->get();

        // if(auth()->user()->role == "admin" || auth()->user()->id == $id){
        // $categories = Category::all();
        $rescuer = Rescuer::with('animals')->with('user')->where('user_id', $id)->first();
         return response()->json($rescuer);
        //       return View::make('rescuer.show', compact('categories','rescuer'));
        // }
        // else{
        //     return redirect()->back();
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $rescuers = DB::table('rescuers')
        //             ->where('id',"=",$id)
        //             ->first();
       // if(auth()->user()->role == "admin" || auth()->user()->id == $id){
        $rescuer = Rescuer::with('user')->where('user_id', $id)->first();
        return response()->json($rescuer);
       // }
       // else{
            // return redirect()->back();
        // }
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
        // $rescuer = Rescuer::where('user_id', $id);
        // return response()->json($rescuer);
     $input = $request->all();
    //  if($request->password != null){
       
    //      $rules = [
    //         'rescuer_fname' => 'required|max:60',
    //         'rescuer_lname' => 'required',
    //         'rescuer_age' => 'required|numeric',
    //         'rescuer_contact' => 'required|numeric',
    //         'rescuer_address' => 'required',
    //         'rescuer_gender' => 'required',
    //         'user_picture'=> 'nullable|image',
    //         'current_password' => 'required',
    //         'password' =>'string|min:8|confirmed',
    //     ];
    // }
    // else{
    //       $rules = [
    //         'rescuer_fname' => 'required|max:60',
    //         'rescuer_lname' => 'required',
    //         'rescuer_age' => 'required|numeric',
    //         'rescuer_contact' => 'required|numeric',
    //         'rescuer_address' => 'required',
    //         'rescuer_gender' => 'required',
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
            $rescuer = Rescuer::where('user_id', $id)->first();
            $user = User::where('id', $id)->first();
             
            if($request->role == "rescuer"){
                 $rescuer->update($input);
            }

            if($request->role == "adopter"){
                $transfer =+ 1;
                $rescuer->delete();
                
                $adopter = Adopter::withTrashed()->where('user_id', $id)->first();
                if($adopter == null){
                    $adopter = new Adopter;
                    $adopter->adopter_fname = $request->rescuer_fname;
                    $adopter->adopter_lname = $request->rescuer_lname;
                    $adopter->adopter_age = $request->rescuer_age;
                    $adopter->adopter_contact = $request->rescuer_contact;
                    $adopter->adopter_address = $request->rescuer_address;
                    $adopter->adopter_gender = $request->rescuer_gender;
                    $adopter->user_id = $input['user_id'];
                    $adopter->save();
                    }
                else{
                    $adopter->restore();
                }
            }

            if($request->role == "veterinarian"){
                $transfer =+ 1;
                $rescuer->delete();
                $veterinarian = Veterinarian::withTrashed()->where('user_id', $id)->first();
                if($veterinarian == null){
                    $veterinarian = new Veterinarian;
                    $veterinarian->veterinarian_fname = $request->rescuer_fname;
                    $veterinarian->veterinarian_lname = $request->rescuer_lname;
                    $veterinarian->veterinarian_age = $request->rescuer_age;
                    $veterinarian->veterinarian_contact = $request->rescuer_contact;
                    $veterinarian->veterinarian_address = $request->rescuer_address;
                    $veterinarian->veterinarian_gender = $request->rescuer_gender;
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
            $user->user_fname = $request->rescuer_fname;
            $user->user_lname = $request->rescuer_lname;
            $user->user_age = $request->rescuer_age;
            $user->user_contact = $request->rescuer_contact;
            $user->user_address = $request->rescuer_address;
            $user->user_gender = $request->rescuer_gender;
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
        $rescuer = Rescuer::with('user')->where('user_id', $id)->first();
        return response()->json($rescuer);
        }
        else{
            return response()->json('transfer');
        }
        
         // return response()->json(['status'=>200]);
    // }

    // if(auth()->user()->role == "admin"){
    //     if(session()->get('cur_tab') == "home"){
    //         return Redirect::route('user.index')->with('success', 'Rescuer is Updated Successfully');
    //     }else{
    //      return Redirect::route('rescuer.index')->with('success', 'Rescuer is Updated Successfully !!!');
    //     }
    // }else{
    //  return Redirect::route('rescuer.show',$id)->with('success', 'Rescuer is Updated Successfully');
    // }
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
          //   return redirect()->back();
          // }
       $rescuer = Rescuer::where('user_id',$id);
       $user = User::where('id',$id);
       $rescuer->delete();
       $user->delete();
        return response()->json(['status'=>200]);
       // if(session()->get('cur_tab') == "home"){
       //  return Redirect::route('user.index')->with('success', 'The Account is deleted  !!!');
       //  }else{
       //   return Redirect::route('rescuer.index')->with('success', 'The Account is deleted  !!!');
       //  }
    }

     public function restore($id)
    {   
          if(auth()->user()->role != "admin"){
            return redirect()->back();
        }
        Rescuer::withTrashed()->where('user_id', $id)->restore();
        if(session()->get('cur_tab') == "home"){
            return Redirect::route('user.index')->with('success', 'The Account is restored !!!');
        }else{
         return Redirect::route('rescuer.index')->with('success', 'The Account is restored  !!!');
        }
    }    
}
