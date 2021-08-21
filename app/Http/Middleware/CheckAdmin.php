<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        else{
               //admin
            if (Auth::user()->id_role == 1) {
                return $next($request);
            }

            //peserta
            if (Auth::user()->id_role == 2) {
                return redirect('/peserta/dashboard_user');
            } 
        }

        
    }
}
