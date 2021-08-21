<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerifyUser;
use Auth;
use App\Models\Pengguna;
use Mail;
use App\Mail\VerifyMail;

class VerifyEmailController extends Controller
{
    public function show(){
    	return view('auth.verify');
    }

    public function verify($id,$token)
	{
	  $verifyUser = VerifyUser::where('token', $token)->first();
	  if(isset($verifyUser)){
	    $user = $verifyUser->user;
	    if(!$user->verified && $user->id_user == $id) {
	      $verifyUser->user->verified = 1;
	      $verifyUser->user->save();
	      $status = "Your e-mail is verified. You can now login.";
	      VerifyUser::where('id_user', $id)->delete();
	    } else {
	      $status = "Your e-mail is already verified. You can now login.";
	    }
	  } else {
	    return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
	  }
	  return redirect('/login')->with('status', $status);
	}

	public function resend(Request $request){
        
        $pengguna = Auth::user();

        $datapendaftar = Pengguna::select('p.nama_pendaftar','p.email_pendaftar','username')
        ->join('pendaftaran as p','p.id_pendaftaran','=','pengguna.id_pendaftaran')
        ->where('id_user','=',$pengguna->id_user)
        ->first();

        $token = sha1(time());

        $link = url('/email/verify/'.$pengguna->id_user.'/'.$token);

        VerifyUser::where('id_user','=',$pengguna->id_user)->delete();

        $verifyUser = VerifyUser::create([
            'id_user' => $pengguna->id_user,
            'token' => $token
        ]);

        Mail::to($datapendaftar->email_pendaftar)->send(new VerifyMail($datapendaftar,$link));
        $request->session()->flash('resent',true);
        return redirect()->route('verification.notice');
	}
}
