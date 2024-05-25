<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Illuminate\Support\Facades\Session;

class Admin_poliMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if(Auth::user()->role == 'admin_poli'){
                return $next($request);
            }else{
                Auth::logout();

                return redirect()->route('sign-in')->with(Session::flash('login_dulu', true));
            }
            
        } else{
            Auth::logout();

            return redirect()->route('sign-in')->with(Session::flash('login_dulu', true));
        }
    }
}
