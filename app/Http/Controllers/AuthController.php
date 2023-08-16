<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Redirect;
use Session;
use DB;
use Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use View;
use \Crypt;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{   


public $emailReciever;
public $emailRecieverFname;
public $emailRecieverLname;


    //
    public function login()
    {   
    	return view('auth.login');
    }

    public function register()
    {
    	return view('auth.register');
    }

    public function create(Request $request)
    {

        // dd($request);
    	 // $request->validate([
      //       'user_fname' => 'required|string|max:255',
      //       'user_lname' => 'required|string|max:255',
      //       'user_age' =>'required|numeric|max:255',
      //       'user_contact' =>'required|numeric',
      //       'user_address' =>'required',
      //       'user_pic' =>'required|image',
      //       'user_gender' =>'required',
      //       'email' => 'required|string|email|max:255|unique:users',
      //       'password' =>'required|string|min:8|confirmed',
      //   ]);

    	 $data = $request->all();

    	 if($request->hasFile('user_pic'))
                {
                    $user_image = $request->file('user_pic')->getClientOriginalName();
                    $t=time();
                    $request->file('user_pic')->storeAs('public/images', $t."-".$user_image);
                    $data['user_picture'] = '/storage/images/'. $t."-".$user_image;
                }
        $data['remember_token'] = Crypt::encrypt(rand());
    	 $user = User::create([
            'user_fname' => $data['user_fname'],
            'user_lname' => $data['user_lname'],
            'user_age' => $data['user_age'],
            'user_contact' => $data['user_contact'],
            'user_address' => $data['user_address'],
            'user_picture' => $data['user_picture'],
            'user_gender' => $data['user_gender'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => $data['remember_token'],
        ]);

    	 // session()->put('UserId', $user->id);
    	 // session()->put('role', $data['role']);
    //      ***Email Start***
    //     $this->emailReciever = $data['email'];
    //     $this->emailRecieverFname =  $data['user_fname'];
    //     $this->emailRecieverLname =  $data['user_fname'];
    //      $button_link = App::make('url')->to('/').'/validate_email/'.$data['remember_token'];

    // Mail::send('email', ['button_link' =>  $button_link], function($message)
    //     {   
    // $message->from('petmania@example.com', 'Petmania');
    // $message->to($this->emailReciever, $this->emailRecieverFname.''.$this->emailRecieverLname)->subject('Welcome!');
    //     });
    // ***Email End***
        // Auth::login($user);

    	 $token = $user->createToken('my-app-token')->plainTextToken;
                $response = [
                    'user' => $user,
                    'token' => $token
                ];
                // return Redirect::route('home');
         return response()->json(['Message'=>'Success','response'=>$response]);
    }

    public function validateEmail($remember_token){
        $user = User::where('remember_token', $remember_token)->first();
        if($user != null){
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            Auth::login($user);
            return Redirect::route('home');
        }else{
            return view('wrong_token');
        }
    }


    public function check(Request $request)
    {

    
    	$user = User::where('email','=',$request->email)
                     ->select('id','password', 'email_verified_at', 'remember_token', 'user_fname', 'user_lname', 'email','role')->first();

    	if($user){
    		if(Hash::check($request->password,$user->password)){
    			

                // if($user->email_verified_at == null){
                //     $this->emailReciever = $user->email;
                //     $this->emailRecieverFname =  $user->user_fname;
                //     $this->emailRecieverLname =  $user->user_fname;

                //     $button_link = App::make('url')->to('/').'/validate_email/'.$user->remember_token;

                //      Mail::send('email', ['button_link' =>  $button_link], function($message)
                //         {   
                //     $message->from('petmania@example.com', 'Petmania');
                //     $message->to($this->emailReciever, $this->emailRecieverFname.''.$this->emailRecieverLname)->subject('Welcome!');
                //         });
                // }
                $user->tokens()->delete();
                
                $token = $user->createToken('my-app-token')->plainTextToken;
            
                $response = [
                    'user' => $user,
                    'token' => $token
                ];

              

    			// return Redirect::route('home');
                 return response()->json(['Message'=>'Success','response'=>$response]);
    		}
    		else{
    		// return back()->with('fail','Incorrect input password');
             return response()->json(['Message'=>'Wrong Password']);
    		}

    	}else{
            return response()->json(['Message'=>'No Account Found']);
    		// return back()->with('fail','No account found for this email');
    	}
    }

    public function home()
    {
        if(Auth::check() == false){
            return redirect()->back();
        }
     $role = auth()->user()->role;
     $user_id = auth()->user()->id;
        // dd($role);

    	if ($role == "new") {
    		return Redirect::route('waiting');
    	}
        if ($role == "rescuer") {
            // dd($user_id);
            return Redirect::route('rescuer.show', ['rescuer' => $user_id]);
        }
         if ($role == "veterinarian") {
             // dd($user_id);
            return Redirect::route('veterinarian.show', ['veterinarian' => $user_id]);
        }
        if ($role == "adopter") {
             // dd($user_id);
            return Redirect::route('adopter.show', ['adopter' => $user_id]);
        }
        if ($role == "admin") {
             // dd($user_id);
            return Redirect::route('dashboard.index');
        }
        if ($role == "deactive") {
            return Redirect::route('deactive');
        }


    	// else{
    	//     return view('user.index');
     //    }

    }

    public function waiting()
    {   


        if (@auth()->user()->role != "new") {

           if (Auth::check() == true && auth()->user()->role != "admin") {
            return redirect()->route('home');
           }

            return redirect()->back();
        }
            return view('waiting');
    }

     public function deactive()
    {   
        if (@auth()->user()->role != "deactive") {

           if (Auth::check() == true && auth()->user()->role != "admin") {
            return redirect()->route('home');
           }

            return redirect()->back();
        }
            return view('deactive');
    }

    public function logout($user_id)
    {
            DB::table('personal_access_tokens')->where('tokenable_id', $user_id)->delete();
    		return response()->json('success');
    	
    }






    public function forgot()
    {
        return view('auth.passwords.email');
    }

    public function password(Request $request)
    {
        $user = DB::table('users')->where('email', '=', $request->email)->first();


         if ($user == null) {
            return redirect()->back()->with('error','Email not exists');
        }
        $tk = Str::random(60);

         DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $tk,
            'created_at' => Carbon::now(),
        ]);

         $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();
        $this->emailReciever = $request->email;
        $this->emailRecieverFname = $user->user_fname;
        $this->emailRecieverLname = $user->user_lname;
        $link = App::make('url')->to('/').'/confirm_password/'. $tokenData->token . '/' . $user->email;

        Mail::send('email_for_reset', ['button_link' =>  $link], function($message)
        {   
         $message->from('petmania@example.com', 'Petmania');
         $message->to($this->emailReciever, $this->emailRecieverFname.''.$this->emailRecieverLname)->subject('Welcome!');
        });


       
        return redirect()->back()->with('send', 'A reset link has been sent to your email address.');
       


        // else {
        //     return redirect()->back()->with('error','A Network Error occurred. Please try again.');
        // } 

    }



    private function sendResetEmail($email, $token)
        {

        //Retrieve the user from the database
        $userInfo = DB::table('users')->where('email', $email)->select('email')->first();

    

        //Generate, the password reset link. The token generated is embedded in the link
        $link = 'petmania.test/confirm_password/' . $token . '/' . $userInfo->email;

       

        $finalLink = <<<HTML
                 <style type="text/css">
          /*RESET  -- this may be ignored by some email clients*/
            body{
                margin:0;
                padding:0;
            }

            img{
                border:0 none;
                height:auto;
                line-height:100%;
                outline:none;
                text-decoration:none;
            }

            a img{
                border:0 none;
            }

            .imageFix{
                display:block;
            }

            table, td{
                border-collapse:collapse;
            }

            #bodyTable{
                height:100% !important;
                margin:0;
                padding:0;
                width:100% !important;
            }
          /*END RESET*/
         </style>



         <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailContainer">      
                  <tr>
                    <td align="center" valign="top" style="padding:0;">
                      
                      
                        <!--HEADER BLACK BAR WITH LOGO-->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailHeader" style="background:#666666; color:#ffffff; margin:0;">
                          <tr>
                            <td align="center">

                              <table border="0" cellpadding="0" cellspacing="0" width="600">
                                  <tr>
                                  </tr>
                              </table>
                            
                            </td>
                          </tr>
                        </table>
                      
                      
                      
                      
                      
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody">
                            <tr>
                                <td align="center" valign="top">
                                  
                                  
                                  <!--MAIN BANNER IMAGE-->
                                  <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#FFFFFF; margin-bottom:10px;">
                                    <tr>
                                      <td>
                                      </td>
                                    </tr>
                                  </table>

                                  <!--MAIN CONTENT COPY-->
                                  <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">Confirm Your Email</h2>

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:20px;">You are just one step away</p>
                                      </td>
                                    </tr>
                                  </table>



                                
                                  <!--MAIN CALL TO ACTION BUTTON-->
                                  <table border="0" cellpadding="0" cellspacing="0" style="background-color:#800000; margin-bottom:20px;">
                                    <tr>
                                        <td align="center" valign="middle" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; letter-spacing:-.5px; line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                                            <a href="$link" target="_blank" style="color:#FFFFFF; text-decoration:none;">Confirm Email</a>
                                        </td>
                                    </tr>
                                </table>
                                  
                           
                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">Click the confirmation button to reset your password</p>
                                      </td>
                                    </tr>
                                  </table>
                                  
                                                           
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
              
                        </table>
                    </td>
                </tr>
            </table>

        HTML;

       

            $sender = new ContactController;
            $sender->send($userInfo->email,'Password Reset', $finalLink);

            return View::make('auth.passwords.email')->with('status','Password reset link successfully send to your gmail');
         }

          public function resetpassword(Request $request){
          //Validate input

          $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed',
        'token' => 'required' ]);

          //check if payload is valid before moving on
          if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }

        $password = $request->password;

        // Validate the token
            $tokenData = DB::table('password_resets')
            ->where('token','=' ,$request->token)->first();

           

        // Redirect the user back to the password reset request form if the token is invalid
            if (!$tokenData) return view('auth.passwords.email');

            $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
            if (!$user) return redirect()->back()->with('email', 'Email not found');

        //Hash and update the new password
            $user->password = Hash::make($password);
            $user->save(); //or $user->save();
           

        //login the user immediately they change password successfully
        // Auth::login($user);
        $request->session()->put('UserId',$user->id);
        

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();


        //Send Email Reset Success Email
        // if ($this->sendSuccessEmail($tokenData->email)) 
        if ($user) 
        {
            $user1 = User::where('email','=',$request->email)->first();
            // $request->session()->put('UserId', $user1->id);
            // $request->session()->put('JobId', $user1->job_id);
            Auth::login($user1);
            return Redirect::route('home');

        } else {
            return redirect()->back()->with('email','A Network Error occurred. Please try again.');
        }

         }




}
