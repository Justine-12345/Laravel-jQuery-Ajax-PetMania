<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinarian;
use App\Models\Category;
use View;
use App\Models\User;
use App\Models\Rescuer;
use App\Models\Adopter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Redirect;
use File;
use App\DataTables\VeterinariansDataTable;
class VeterinarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VeterinariansDataTable $dataTable)
    {
        //
        //  if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        // session()->put('cur_tab', 'veterinarians');
        // return $dataTable->render('veterinarian.index');
         $veterinarians = Veterinarian::OrderBy('id','desc')->where('deleted_at',null)->where('is_Add',null)->get();
        return response()->json(['data'=>$veterinarians]);
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

        return View::make('veterinarian.create');
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
        // if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        //
         $input = $request->all();
         // dd($input);
        
    
        if($request->hasFile('veterinarian_pic'))
        {
            $rescuer_image = $request->file('veterinarian_pic')->getClientOriginalName();
            $t=time();
            $request->file('veterinarian_pic')->storeAs('public/images', $t."-".$rescuer_image);
            $input['user_picture'] = '/storage/images/'. $t."-".$rescuer_image;
        }
         
        $input['role'] = "veterinarian";
        $user = User::create([
        'user_fname' => $input['veterinarian_fname'],
        'user_lname' => $input['veterinarian_lname'],
        'user_age' => $input['veterinarian_age'],
        'user_contact' => $input['veterinarian_contact'],
        'user_address' => $input['veterinarian_address'],
        'user_gender' => $input['veterinarian_gender'],
        'user_picture' => $input['user_picture'],
        'role' => $input['role'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $input['user_id'] = $user->id;

        $veterinarian = Veterinarian::create($input);

        $newVeterinarian = Veterinarian::where('id', $veterinarian->id)
        ->select('user_id','veterinarian_fname', 'veterinarian_lname', 'veterinarian_age', 'veterinarian_contact', 'veterinarian_address', 'veterinarian_gender')
        ->first();
        
        return response()->json($newVeterinarian);
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
        
        // if(auth()->user()->role == "admin" || auth()->user()->id == $id){
        // $categories = Category::all();
        // $veterinarian = Veterinarian::with('animals')->with('user')->where('user_id', $id)->first();
        //     return View::make('veterinarian.show', compact('categories','veterinarian'));
        // }
        // else{
        //     return redirect()->back();
        // }
        $veterinarian = Veterinarian::with('animals')->with('user')->where('user_id', $id)->first();
         return response()->json($veterinarian);
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
       //  $veterinarian = Veterinarian::with('user')->where('user_id', $id)->first();
       //  return View::make('veterinarian.edit', compact('veterinarian'));
       // }
       // else{
       //      return redirect()->back();
       //  }
        $veterinarian = Veterinarian::with('user')->where('user_id', $id)->first();
        return response()->json($veterinarian);
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
    //         'veterinarian_fname' => 'required|max:60',
    //         'veterinarian_lname' => 'required',
    //         'veterinarian_age' => 'required|numeric',
    //         'veterinarian_contact' => 'required|numeric',
    //         'veterinarian_address' => 'required',
    //         'veterinarian_gender' => 'required',
    //         'user_picture'=> 'nullable|image',
    //         'current_password' => 'required',
    //         'password' =>'string|min:8|confirmed',
    //     ];
    // }
    // else{
    //       $rules = [
    //         'veterinarian_fname' => 'required|max:60',
    //         'veterinarian_lname' => 'required',
    //         'veterinarian_age' => 'required|numeric',
    //         'veterinarian_contact' => 'required|numeric',
    //         'veterinarian_address' => 'required',
    //         'veterinarian_gender' => 'required',
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
        $veterinarian = Veterinarian::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();
          // dd($veterinarian);
        if($request->role == "veterinarian"){
             $veterinarian->update($input);
        }

        if($request->role == "adopter"){
            $transfer =+ 1;
            $veterinarian->delete();
            $adopter = Adopter::withTrashed()->where('user_id', $id)->first();
            if($adopter == null){
                $adopter = new Adopter;
                $adopter->adopter_fname = $request->veterinarian_fname;
                $adopter->adopter_lname = $request->veterinarian_lname;
                $adopter->adopter_age = $request->veterinarian_age;
                $adopter->adopter_contact = $request->veterinarian_contact;
                $adopter->adopter_address = $request->veterinarian_address;
                $adopter->adopter_gender = $request->veterinarian_gender;
                $adopter->user_id = $input['user_id'];
                $adopter->save();
                }
            else{
                $adopter->restore();
            }
        }

        if($request->role == "rescuer"){
            $transfer =+ 1;
            $veterinarian->delete();
             
            $rescuer = Rescuer::withTrashed()->where('user_id', $id)->first();
            if($rescuer == null){
                $rescuer = new Rescuer;
                $rescuer->rescuer_fname = $request->veterinarian_fname;
                $rescuer->rescuer_lname = $request->veterinarian_lname;
                $rescuer->rescuer_age = $request->veterinarian_age;
                $rescuer->rescuer_contact = $request->veterinarian_contact;
                $rescuer->rescuer_address = $request->veterinarian_address;
                $rescuer->rescuer_gender = $request->veterinarian_gender;
                $rescuer->user_id = $input['user_id'];
                $rescuer->save();
                }
            else{
                $rescuer->restore();
            }
        }

        if($request->role == "admin"){
                $transfer =+ 1;
                $rescuer->delete();
            }

        $user->user_fname = $request->veterinarian_fname;
        $user->user_lname = $request->veterinarian_lname;
        $user->user_age = $request->veterinarian_age;
        $user->user_contact = $request->veterinarian_contact;
        $user->user_address = $request->veterinarian_address;
        $user->user_gender = $request->veterinarian_gender;
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
        $veterinarian = Veterinarian::with('user')->where('user_id', $id)->first();
        return response()->json($veterinarian);
        }
        else{
            return response()->json('transfer');
        }
// }   
// if(auth()->user()->role == "admin"){
//         if(session()->get('cur_tab') == "home"){
//              return Redirect::route('user.index')->with('success', 'Account is Updated Successfully');
//         }else{
//          return Redirect::route('veterinarian.index')->with('success', 'Account is Updated Successfully  !!!');
//         }

//     }else{
//      return Redirect::route('veterinarian.show',$id)->with('success', 'Account is Updated Successfully');
//  }
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
       $veterinarian = Veterinarian::where('user_id',$id);
       $user = User::where('id',$id);
       $veterinarian->delete();
       $user->delete();
       return response()->json(['status'=>200]);
       // if(session()->get('cur_tab') == "home"){
       //  return Redirect::route('user.index')->with('success', 'The Account is deleted  !!!');
       //  }else{
       //   return Redirect::route('veterinarian.index')->with('success', 'The Account is deleted  !!!');
       //  }
    }
}
