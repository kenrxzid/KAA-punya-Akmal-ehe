<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckPeserta
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
            return redirect()->route('login');
        }

        //admin
        if (Auth::user()->id_role == 1) {
            return redirect('/admin');
        }
            
        return $next($request);
        
    }
}
