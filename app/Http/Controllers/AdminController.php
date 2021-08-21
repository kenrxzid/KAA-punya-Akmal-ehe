<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Pengguna;
use DB;
use App\Exports\SemuaExport;
use App\Exports\PesertaExport;
use App\Exports\PendaftarExport;
use App\Exports\MoodleExport;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\PembayaranDiterimaMail;
use Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function home(){
        $dateMin1 = date("Y-m-d",strtotime("2020-09-14"));
        $dateMax1 = date("Y-m-d",strtotime("2020-09-14"));
        $dateMax2 = date("Y-m-d",strtotime("2020-09-21"));
        $dateMax3 = date("Y-m-d",strtotime("2020-09-28"));
        $dateMax4 = date("Y-m-d",strtotime("2020-09-29"));
        $dateMax5 = date("Y-m-d",strtotime("2020-09-30"));
        $dateMax6 = date("Y-m-d",strtotime("2020-10-04"));
        $dateMax7 = date("Y-m-d",strtotime("2020-10-08"));
        $dateMax8 = date("Y-m-d",strtotime("2020-10-14"));

    	$peserta = Pendaftaran::where('status_pendaftaran','=',1)->count();
    	$pendaftar = Pendaftaran::count();
    	$konfirmasi = Pembayaran::count();
    	$pditerima = Pembayaran::where('status_pembayaran','=',1)->count();
    	$datacard = [$peserta,$pendaftar,$konfirmasi,$pditerima];

    	$datagraphic1 = Pendaftaran::whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax1])->count();
    	$datagraphic2 = Pendaftaran::whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax2])->count();
    	$datagraphic3 = Pendaftaran::whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax3])->count();
    	$datagraphic4 = Pendaftaran::whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax4])->count();
    	$datagraphic5 = Pendaftaran::whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax5])->count();
    	$datagraphic6 = Pendaftaran::whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax6])->count();
    	$datagraphic7 = Pendaftaran::whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax7])->count();
    	$datagraphic8 = Pendaftaran::whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax8])->count();
    	$datagraphic = [$datagraphic1,$datagraphic2,$datagraphic3,$datagraphic4,$datagraphic5,$datagraphic6,$datagraphic7,$datagraphic8];

    	$datagraphic1_p = Pendaftaran::where('status_pendaftaran','=','1')->whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax1])->count();
    	$datagraphic2_p = Pendaftaran::where('status_pendaftaran','=','1')->whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax2])->count();
    	$datagraphic3_p = Pendaftaran::where('status_pendaftaran','=','1')->whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax3])->count();
    	$datagraphic4_p = Pendaftaran::where('status_pendaftaran','=','1')->whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax4])->count();
    	$datagraphic5_p = Pendaftaran::where('status_pendaftaran','=','1')->whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax5])->count();
    	$datagraphic6_p = Pendaftaran::where('status_pendaftaran','=','1')->whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax6])->count();
    	$datagraphic7_p = Pendaftaran::where('status_pendaftaran','=','1')->whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax7])->count();
    	$datagraphic8_p = Pendaftaran::where('status_pendaftaran','=','1')->whereBetween(DB::raw('DATE(tgl_pendaftaran)'),[$dateMin1,$dateMax8])->count();
    	$datagraphic_p = [$datagraphic1_p,$datagraphic2_p,$datagraphic3_p,$datagraphic4_p,$datagraphic5_p,$datagraphic6_p,$datagraphic7_p,$datagraphic8_p];

    	$datakonfirmasi = Pembayaran::select('p.pas_foto','p.nama_pendaftar','total_pembayaran','status_pembayaran')->join('pendaftaran as p','p.id_pendaftaran','=','pembayaran.id_pendaftaran')->orderBy('p.tgl_pendaftaran','DESC')->take(3)->get();

    	$datapendaftar = Pendaftaran::select('pendaftaran.pas_foto','pendaftaran.nama_pendaftar','pendaftaran.asal_univ_pendaftar','p.status_pembayaran','pendaftaran.status_pendaftaran')->leftJoin('pembayaran as p','p.id_pendaftaran','=','pendaftaran.id_pendaftaran')->orderBy('pendaftaran.tgl_pendaftaran','DESC')->take(3)->get();

    	return view('admin.dashboard',['datacard' => $datacard,'datagraphic' => $datagraphic,'datakonfirmasi' => $datakonfirmasi,'datapendaftar' => $datapendaftar,'datagraphic_p' => $datagraphic_p]);
    }
    public function pendaftar(){
    	// All
    	$seluruhdata = Pendaftaran::select('pendaftaran.*','p.status_pembayaran')->leftJoin('pembayaran as p','p.id_pendaftaran','=','pendaftaran.id_pendaftaran')->orderBy('pendaftaran.tgl_pendaftaran','DESC')->paginate(10);
    	// Peserta
    	$datapeserta = Pendaftaran::select('pendaftaran.*','pendaftaran.nama_pendaftar','pendaftaran.asal_univ_pendaftar','p.status_pembayaran')->leftJoin('pembayaran as p','p.id_pendaftaran','=','pendaftaran.id_pendaftaran')->where('pendaftaran.status_pendaftaran','=','1')->orderBy('pendaftaran.tgl_pendaftaran','DESC')->paginate(10);
    	// Pendaftar
    	$datapendaftar = Pendaftaran::select('pendaftaran.*','p.status_pembayaran')->leftJoin('pembayaran as p','p.id_pendaftaran','=','pendaftaran.id_pendaftaran')->where('pendaftaran.status_pendaftaran','=','0')->orderBy('pendaftaran.tgl_pendaftaran','DESC')->paginate(10);

    	return view('admin.pendaftar',['all' => $seluruhdata,'peserta' => $datapeserta, 'pendaftar' => $datapendaftar]);
    }
    public function verifikasi(){
    	$datasemua = Pembayaran::select('pembayaran.*','p.*')->join('pendaftaran as p','p.id_pendaftaran','=','pembayaran.id_pendaftaran')->orderBy('pembayaran.tanggal_pembayaran','DESC')->paginate(10);
    	$databelum = Pembayaran::select('pembayaran.*','p.*')->join('pendaftaran as p','p.id_pendaftaran','=','pembayaran.id_pendaftaran')->where('status_pembayaran','=',0)->orderBy('pembayaran.tanggal_pembayaran','DESC')->paginate(10);
    	$datasudah = Pembayaran::select('pembayaran.*','p.*')->join('pendaftaran as p','p.id_pendaftaran','=','pembayaran.id_pendaftaran')->where('status_pembayaran','=',1)->orWhere('status_pembayaran','=',2)->orderBy('pembayaran.tanggal_pembayaran','DESC')->paginate(10);
    	return view('admin.verifikasi',['datasemua' => $datasemua,'databelum' => $databelum,'datasudah' => $datasudah]);
    }

    public function exportSemua(){
    	return Excel::download(new SemuaExport, 'Data Peserta dan Pendaftar.xlsx');
    }

    public function exportPendaftar(){
    	return Excel::download(new PendaftarExport, 'Data Pendaftar.xlsx');
    }

    public function exportPeserta(){
    	return Excel::download(new PesertaExport, 'Data Peserta.xlsx');
    }
    
    public function exportMoodleUser(){
        return Excel::download(new MoodleExport, 'Data User Moodle.csv');
    }

    public function verifikasiTrue($id){
    	$pembayaran = Pembayaran::find($id);
    	$pembayaran->status_pembayaran = 1;
    	$pembayaran->save();

        $link = url('/peserta/form_pendaftaran');
        $pendaftar = Pendaftaran::find($pembayaran->id_pendaftaran);
        Mail::to($pendaftar->email_pendaftar)->send(new PembayaranDiterimaMail($pendaftar,$link));

    	return response()->json(['success' => true]);
    }
    public function verifikasiFalse($id){
    	$pembayaran = Pembayaran::find($id);
    	$pembayaran->status_pembayaran = 2;
    	$pembayaran->save();

    	return response()->json(['success' => true]);
    }

    public function viewScanKTM($id){
        $namafile = Pendaftaran::find($id)->scan_ktm;
        return redirect('/storage/'.$namafile);
    }

    public function viewPasFoto($id){
        $namafile = Pendaftaran::find($id)->pas_foto;
        return redirect('/storage/'.$namafile);
    }

    public function viewScanSuketAktif($id){
        $namafile = Pendaftaran::find($id)->scan_suket_aktif;
        return redirect('/storage/'.$namafile);
    }

    public function downloadScanKTM($id){
        $namafile = Pendaftaran::find($id)->scan_ktm;
        $namafile = public_path()."/storage/".$namafile;
        return Response::download($namafile);
    }

    public function downloadPasFoto($id){
        $namafile = Pendaftaran::find($id)->pas_foto;
        $namafile = public_path()."/storage/".$namafile;
        return Response::download($namafile);
    }

    public function downloadScanSuketAktif($id){
        $namafile = Pendaftaran::find($id)->scan_suket_aktif;
        $namafile = public_path()."/storage/".$namafile;
        return Response::download($namafile);
    }

}
