<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next, ...$roles)
    {   
        // dd($request->path());
        if(!Auth::check()){
            return redirect()->route('login');
        }
       
        $user = Auth::user();
        foreach($roles as $role) {


        if($user->role == $role){
            $headers = [
            'Cache-Control' => 'nocache, no-store, max-age=0, must-revalidate',
            'Pragma'     => 'no-cache',
            'Expires' => 'Sun, 02 Jan 1990 00:00:00 GMT'
            ];

        $response = $next($request);
        foreach($headers as $key => $value) {
            $response->headers->set($key, $value);
        }
 
        return $response;
             }


        }
        return redirect()->back(); 
    }
}
