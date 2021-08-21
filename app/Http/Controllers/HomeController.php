<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Pengguna;
use App\Providers\RouteServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect('/');
        }
        if (Auth::user()->id_role == 1) {
            return redirect('/admin');
        }
        else if (Auth::user()->id_role == 2) {
            return redirect('/peserta/dashboard_user');
        }
    }

}
