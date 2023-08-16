<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Redirect;
use Session;
class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if (Session::get('JobId') == 1 && ($request->path() != 'waiting')) {
            return Redirect::route('waiting');
        }
        if (Session::get('JobId') != 5 && ($request->path() == 'message')) {
           return back();
        }


        if(!(session()->has('UserId')) && ($request->path() != 'login' && $request->path() != 'register' && $request->path() != 'forgot_password' && $request->path() != 'message/create')){
            return Redirect::route('login')->with('fail', 'You must login first');
        }
        
        if (session()->has('UserId') && ($request->path() == 'login' ||  $request->path() == 'register' || $request->path() == 'forgot_password'|| $request->path() == 'message/create')) {
            return back();
        }

         return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate'    )
            ->header('Pragma','no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
