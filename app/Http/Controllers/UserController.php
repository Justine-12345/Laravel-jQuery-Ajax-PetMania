<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use View;
use DB;
use App\Models\User;
use App\Models\Veterinarian;
use App\Models\Adopter;
use App\Models\Rescuer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;
use App\DataTables\UsersDataTable;
use App\Imports\UsersImport;
use App\Rules\Import;
use Excel;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        //
        // $users = User::leftJoin('jobs','jobs.id','users.job_id')
        // ->select('users.*','jobs.job_name')
        // ->orderBy('id', 'DESC')->withTrashed()->paginate(10);
        // return View::make('user.index', compact('users'));
        //  if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        // session()->put('cur_tab', 'home');
        // return $dataTable->render('user.index');
         $user = User::OrderBy('id','desc')->where('deleted_at',null)->where('role','new')->get();
        return response()->json(['data'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
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
        $request->validate([
            'user_fname' => 'required|string|max:255',
            'user_lname' => 'required|string|max:255',
            'user_age' =>'required|numeric|max:255',
            'user_contact' => 'numeric|required',
            'user_address' =>'required',
            'user_pic' =>'required|image',
            'user_gender' =>'required',
            'job_id' =>'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required|string|min:8|confirmed',
        ]);

         $data = $request->all();


$validator = Validator::make($request->all(), $rules);
if($validator->passes())
{

         if($request->hasFile('user_pic'))
                {
                    $user_image = $request->file('user_pic')->getClientOriginalName();
                    $t=time();
                    $request->file('user_pic')->storeAs('public/images', $t."-".$user_image);
                    $data['user_picture'] = 'storage/images/'. $t."-".$user_image;
                }
         $user = User::create([
            'user_fname' => $data['user_fname'],
            'user_lname' => $data['user_lname'],
            'user_age' => $data['user_age'],
            'user_contact' => $data['user_contact'],
            'user_address' => $data['user_address'],
            'user_picture' => $data['user_picture'],
            'user_gender' => $data['user_gender'],
            'job_id' => $data['job_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

         return Redirect::route('user.index')->with('success','Welcome To Our Petshop wait for Admin Confirmation!!!');

}
else
{
     return redirect()->back()->withInput()->withErrors($validator);
}


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

        // $users = User::withTrashed()->leftJoin('jobs','jobs.id','users.job_id')
        // ->select('users.*','jobs.job_name', 'jobs.job_desc')
        // ->where('users.id',"=",$id)
        // ->get()->toArray();
        
        // $categories = Category::all();
        // $find_user = User::where('id', $id)->first();

        // $role = $find_user->role;

        // if($role == 'rescuer'){
        //   return Redirect::route('rescuer.show', ['rescuer' => $id]);
        // }
        //  if ($role == "veterinarian") {
        //      // dd($user_id);
        //     return Redirect::route('veterinarian.show', ['veterinarian' => $id]);
        // }
        // if ($role == "adopter") {
        //      // dd($user_id);
        //     return Redirect::route('adopter.show', ['adopter' => $id]);
        // }
        // if ($role == "admin" || $role == "new" || $role == "deactive") {
        //      // dd($user_id);
        //     $user = User::where('id', $id)->first();
        //     return View::make('user.show', compact('user'));
        // }

        // return View::make('user.show', compact('users'));
         $user = User::where('id', $id)->first();
         return response()->json($user);
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
        // $jobs = DB::table('jobs')->pluck('job_name', 'id');
        // $users = DB::table('users')
        //             ->where('id',"=",$id)
        //             ->first();
        
        // return View::make('user.edit', compact('users', 'jobs'));
        //***START HERE***
        // $find_user = User::where('id', $id)->first();

        // $role = $find_user->role;

        // if($role == 'rescuer'){
        //   return Redirect::route('rescuer.edit', ['rescuer' => $id]);
        // }
        //  if ($role == "veterinarian") {
        //      // dd($user_id);
        //     return Redirect::route('veterinarian.edit', ['veterinarian' => $id]);
        // }
        // if ($role == "adopter") {
        //      // dd($user_id);
        //     return Redirect::route('adopter.edit', ['adopter' => $id]);
        // }
        // if ($role == "admin" || $role == "new" || $role == "deactive") {
        //      // dd($user_id);
        //     $user = User::where('id', $id)->first();
        //     return View::make('user.edit', compact('user'));
        // }

        $user = User::where('id', $id)->first();
        return response()->json($user);


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
    //         'user_fname' => 'required|max:60',
    //         'user_lname' => 'required',
    //         'user_age' => 'required|numeric',
    //         'user_contact' => 'required|numeric',
    //         'user_address' => 'required',
    //         'user_gender' => 'required',
    //         'user_picture'=> 'nullable|image',
    //         'current_password' => 'required',
    //         'password' =>'string|min:8|confirmed',
    //     ];
    // }
    // else{
    //       $rules = [
    //         'user_fname' => 'required|max:60',
    //         'user_lname' => 'required',
    //         'user_age' => 'required|numeric',
    //         'user_contact' => 'required|numeric',
    //         'user_address' => 'required',
    //         'user_gender' => 'required',
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
         

        if($request->role == "adopter"){
             $transfer =+ 1;
            $adopter = Adopter::withTrashed()->where('user_id', $id)->first();
            if($adopter == null){
                $adopter = new Adopter;
                $adopter->adopter_fname = $request->user_fname;
                $adopter->adopter_lname = $request->user_lname;
                $adopter->adopter_age = $request->user_age;
                $adopter->adopter_contact = $request->user_contact;
                $adopter->adopter_address = $request->user_address;
                $adopter->adopter_gender = $request->user_gender;
                $adopter->user_id = $input['user_id'];
                $adopter->save();
                }
            else{
                $adopter->restore();
            }
        }

        if($request->role == "veterinarian"){
                $transfer =+ 1;
            $veterinarian = Veterinarian::withTrashed()->where('user_id', $id)->first();
            if($veterinarian == null){
                $veterinarian = new Veterinarian;
                $veterinarian->veterinarian_fname = $request->user_fname;
                $veterinarian->veterinarian_lname = $request->user_lname;
                $veterinarian->veterinarian_age = $request->user_age;
                $veterinarian->veterinarian_contact = $request->user_contact;
                $veterinarian->veterinarian_address = $request->user_address;
                $veterinarian->veterinarian_gender = $request->user_gender;
                $veterinarian->user_id = $input['user_id'];
                $veterinarian->save();
                }
            else{
                $veterinarian->restore();
            }
        }

        if($request->role == "rescuer"){
             $transfer =+ 1;
            $rescuer = Rescuer::withTrashed()->where('user_id', $id)->first();
            if($rescuer == null){
                $rescuer = new Rescuer;
                $rescuer->rescuer_fname = $request->user_fname;
                $rescuer->rescuer_lname = $request->user_lname;
                $rescuer->rescuer_age = $request->user_age;
                $rescuer->rescuer_contact = $request->user_contact;
                $rescuer->rescuer_address = $request->user_address;
                $rescuer->rescuer_gender = $request->user_gender;
                $rescuer->user_id = $input['user_id'];
                $rescuer->save();
                }
            else{
                $rescuer->restore();
            }
        }


        $user->user_fname = $request->user_fname;
        $user->user_lname = $request->user_lname;
        $user->user_age = $request->user_age;
        $user->user_contact = $request->user_contact;
        $user->user_address = $request->user_address;
        $user->user_gender = $request->user_gender;
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
        $user = User::where('id', $id)->first();
        return response()->json($user);
        }
        else{
            return response()->json('transfer');
        }

     // return redirect()->back()->withInput()->withErrors($validator);
// }
       // return Redirect::route('user.index')->with('success', 'User is Updated Successfully');
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
        // $user = User::findOrFail($id);
        // $user->delete();

       $find_user = User::where('id', $id)->first();
       $find_user->delete();
       return response()->json(['status'=>200]);
        // $role = $find_user->role;

        // if($role == 'rescuer'){
        //    $rescuer = Rescuer::where('user_id',$id);
        //    $rescuer->delete(); 
        //    $find_user->delete();
        // }
        //  if ($role == "veterinarian") {
        //    $veterinarian = Veterinarian::where('user_id',$id);
        //    $veterinarian->delete(); 
        //    $find_user->delete();
        // }
        // if ($role == "adopter") {
        //    $adopter = Adopter::where('user_id',$id);
        //    $adopter->delete(); 
        //    $find_user->delete();
        // }
        // if ($role == "admin" || $role == "new") {
        //    $find_user->delete();
        // }



        return Redirect::route('user.index')->with('success', 'The Account is deleted  !!!');
    }

    public function restore($id)
    {
        //
        User::withTrashed()->where('id', $id)->restore();
        return Redirect::route('user.index')->with('success', 'The Account is restored !!!');
    }

    public function import(Request $request) {
    
        $request->validate([
        'user_import' => ['required', new Import($request->file('user_import'))],
        ]);

        Excel::import(new UsersImport, request()->file('user_import')->store('temp'));

        return redirect()->back()->with('success', 'Successfully done the operation.');
    }
}
