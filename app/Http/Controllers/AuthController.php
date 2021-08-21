<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use App\Models\VerifyUser;

class AuthController extends Controller
{

    public function register()
    {
        return view('registerv1');
    }

    public function postregister(Request $request)
    {
        $request->validate([
            'nama_pendaftar' => 'required',
            'asal_univ_pendaftar' => 'required',
            'email_pendaftar' => 'required|email|unique:pengguna,email',
            'username' => 'required|unique:pengguna,username|regex:/^\S*$/',
            'password_user' => 'required'
        ]);

        DB::transaction(function () use ($request) {

            $pendaftaran = Pendaftaran::create([
                'nama_pendaftar' => ucwords(strtolower($request->nama_pendaftar)),
                'asal_univ_pendaftar' => ucwords($request->asal_univ_pendaftar),
                'email_pendaftar' => strtolower($request->email_pendaftar),
                'status_pendaftaran' => 0
            ]);

            $id_daftar = Pendaftaran::select('id_pendaftaran')->where([
                'nama_pendaftar' => ucwords(strtolower($request->nama_pendaftar)),
                'asal_univ_pendaftar' => ucwords($request->asal_univ_pendaftar),
                'email_pendaftar' => strtolower($request->email_pendaftar),
                'status_pendaftaran' => 0
            ])->orderBy('id_pendaftaran', 'DESC')->first();

            $pengguna = Pengguna::create([
                'id_role' => 2,
                'id_pendaftaran' => $id_daftar->id_pendaftaran,
                'username' => strtolower($request->username),
                'password' => bcrypt($request->password_user),
                'status_user' => 1,
                'email' => strtolower($request->email_pendaftar)
            ]);

            $datapendaftar = Pengguna::select('p.nama_pendaftar', 'p.email_pendaftar', 'username')
                ->join('pendaftaran as p', 'p.id_pendaftaran', '=', 'pengguna.id_pendaftaran')
                ->where('username', '=', strtolower($request->username))
                ->first();

            $pengguna = Pengguna::where('username', '=', strtolower($request->username))->first();

            $token = sha1(time());

            $link = url('/email/verify/' . $pengguna->id_user . '/' . $token);

            $verifyUser = VerifyUser::create([
                'id_user' => $pengguna->id_user,
                'token' => $token
            ]);

            Mail::to($datapendaftar->email_pendaftar)->send(new VerifyMail($datapendaftar, $link));

            Auth::login($pengguna);
        });

        return redirect('/email/verify');
    }

    public function changepass(Request $req)
    {

        $id = Auth::user()->id_user;
        $pengguna = Pengguna::find($id);
        if (Hash::check($req->pwnow, $pengguna->password)) {
            if ($req->pwnew == $req->pwnew2) {
                $pengguna->password = Hash::make($req->pwnew);
                $pengguna->save();
            }
        }

        return redirect('/home');
    }

    public function cekUsername($uname)
    {

        $jumlah = Pengguna::select("username")->where('username', '=', $uname)->count();

        if ($jumlah == 1) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
