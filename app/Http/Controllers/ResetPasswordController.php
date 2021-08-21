<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use DB;
use App\Mail\ResetMail;
use App\Models\Pendaftaran;
use Mail;

class ResetPasswordController extends Controller
{
    public function show(){
    	return view('auth.password.emailv1');
    }

    public function sendmail(Request $request){
    	$request->validate([
    		'email' => 'required|email'
    	]);

    	$email = $request->email;

    	$pengguna = Pengguna::where('email','=',$email)->first();

    	if(isset($pengguna)){
    		$token = sha1(time());

	        $link = url('/password/reset/'.$token);

	        DB::table('password_resets')->insert([
	        	'email' => $email,
	        	'token' => $token
	        ]);

	        $datapendaftar = Pendaftaran::where('email_pendaftar','=',$email)->first();

	        Mail::to($email)->send(new ResetMail($datapendaftar,$link));
	        $request->session()->flash('sentpassword',true);

	        return redirect()->route('reset.notice');
    	}

    	else{
    		$request->session()->flash('sentfailed',true);

	        return redirect()->route('reset.notice');
    	}

        
    }

    public function insertPassword(Request $request,$token){

    	$pwreset = DB::table('password_resets')->where('token', $token)->first();

    	if(isset($pwreset)){
    		return view('auth.password.password',["token" => $token]);
    	}
    	else{
    		$request->session()->flash('notfound',true);
    		return view('auth.password.password',["token" => $token]);
    	}

		return redirect('/home');

    }

    public function changePass(Request $request){

    	$request->validate([
    		'password' =>'required',
    		'konfirmpassword' => 'required|same:password'
    	]);

    	$pwreset = DB::table('password_resets')->where('token', $request->token)->first();

    	$pengguna = Pengguna::where('email','=',$pwreset->email)->first();

    	$pengguna->password = bcrypt($request->password);
    	$pengguna->save();

    	$request->session()->flash('reset',true);

    	DB::table('password_resets')->where('token', $request->token)->delete();
        
        return back();

    }
}
