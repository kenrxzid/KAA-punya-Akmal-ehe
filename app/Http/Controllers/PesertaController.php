<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftaran;
use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\Akun_Moodle;
use Auth;
use Storage;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\KonfirmasiDiterimaMail;
use Illuminate\Support\Carbon;


class PesertaController extends Controller
{
    public function dashboard_user()
    {
        $lolos = DB::table('lolos_preliminary')->where('email', '=', Auth::user()->email)->whereNotNull('email')->exists();
        $now = Carbon::now('Asia/Jakarta');
        $open = Carbon::create(2020, 10, 19, 10, 00, 00, 'Asia/Jakarta');

        return view('peserta/dashboard_userv1', compact("lolos", "now", "open"));
    }

    public function alur_pembayaran()
    {
        return view('peserta/alur_pembayaranv1');
    }

    public function konfirmasi_pembayaran()
    {
        return view('peserta/konfirmasi_pembayaranv1');
    }

    public function store_pembayaran(Request $request)
    {

        $request->validate([
            'bukti_pembayaran' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'atas_nama_rekening' => 'required|string|max:50',
            'bank_asal' => 'required|string|max:25',
            'nomor_rekening' => 'required|numeric',
            'total_pembayaran' => 'required|numeric',
        ]);
        DB::transaction(function () use ($request) {
            $pembayaran = new Pembayaran;
            $pembayaran->id_pendaftaran = Auth::user()->id_pendaftaran;
            $pembayaran->atas_nama_rekening = ucwords($request->atas_nama_rekening);
            $pembayaran->bank_asal = ucwords($request->bank_asal);
            $pembayaran->nomor_rekening = $request->nomor_rekening;
            $pembayaran->total_pembayaran = $request->total_pembayaran;
            $pembayaran->status_pembayaran = 0;

            $namafile = 'bukti_pembayaran-' . Auth::user()->id_pendaftaran . '.' . $request->file('bukti_pembayaran')->extension();
            $path = Storage::disk('public')->putFileAs(
                '/bukti_pembayaran',
                $request->file('bukti_pembayaran'),
                $namafile,
                'public'
            );
            $pembayaran->bukti_pembayaran = 'bukti_pembayaran/' . $namafile;

            $pembayaran->save();

            session()->flash('success', 'Data Berhasil Di Tambahkan!');

            $pendaftar = Pendaftaran::find(Auth::user()->id_pendaftaran);

            Mail::to(Auth::user()->email)->send(new KonfirmasiDiterimaMail($pendaftar));
        });

        return redirect('/peserta/konfirmasi_pembayaran');
    }

    public function form_pendaftaran()
    {
        $daftar = Pendaftaran::where('status_pendaftaran', '=', '1')->first();
        return view('peserta/form_pendaftaran', compact('daftar'));
    }
    public function store_pendaftaran(Request $request)
    {
        $this->validate($request, [
            'asal_daerah' => 'required|max:30',
            'no_telepon_pendaftar' => 'required|numeric',
            'id_line_pendaftar' => 'max:25',
            'scan_ktm' => 'required|file|max:2048|mimes:pdf,jpeg,png,jpg',
            'pas_foto' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'scan_suket_aktif' => 'file|max:2048|mimes:pdf',
        ]);
        DB::transaction(function () use ($request) {
            $pendaftaran = Pendaftaran::find(Auth::user()->id_pendaftaran);
            $pendaftaran->asal_daerah = ucwords($request->asal_daerah);
            $pendaftaran->no_telepon_pendaftar = $request->no_telepon_pendaftar;
            $pendaftaran->id_line_pendaftar = $request->id_line_pendaftar;
            $pendaftaran->status_pendaftaran = 1;

            $namafilescanktm = 'scan_ktm-' . Auth::user()->id_pendaftaran . '.' . $request->file('scan_ktm')->extension();
            $namafilefoto = 'pas_foto-' . Auth::user()->id_pendaftaran . '.' . $request->file('pas_foto')->extension();

            if ($request->file('scan_suket_aktif') != null) {
                $namafilescansuket = 'scan_suket_aktif-' . Auth::user()->id_pendaftaran . '.' . $request->file('scan_suket_aktif')->extension();
                Storage::disk('public')->putFileAs(
                    '/scan_suket_aktif',
                    $request->file('scan_suket_aktif'),
                    $namafilescansuket,
                    'public'
                );
                $pendaftaran->scan_suket_aktif = 'scan_suket_aktif/' . $namafilescansuket;
            }

            Storage::disk('public')->putFileAs(
                '/scan_ktm',
                $request->file('scan_ktm'),
                $namafilescanktm,
                'public'
            );
            Storage::disk('public')->putFileAs(
                '/pas_foto',
                $request->file('pas_foto'),
                $namafilefoto,
                'public'
            );

            $pendaftaran->scan_ktm = 'scan_ktm/' . $namafilescanktm;
            $pendaftaran->pas_foto = 'pas_foto/' . $namafilefoto;

            $pendaftaran->save();

            $password = Str::random(10);

            DB::table('akun_moodle')->insertOrIgnore([
                'id_user' => Auth::user()->id_user,
                'password_moodle' => $password,
            ]);

            session()->flash('success', 'Data Berhasil Di Tambahkan!');
        });
        return redirect('/peserta/form_pendaftaran');
    }

    public function cetak_kartu_peserta()
    {
        $bayar2 = Pendaftaran::Join('pembayaran as p', 'p.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('p.status_pembayaran', '=', '1')->first();

        return view('peserta/cetak_kartu_pesertav1', compact('bayar2'));
    }

    public function exportpdf() //mencetak kartu peserta menjadi pdf
    {
        $id = Auth::user()->id_user;
        $akun = Akun_Moodle::select("password_moodle")->where('id_user', '=', $id)->first();
        return PDF::loadView('peserta/kartupeserta', compact('akun'))->download('kartu_peserta.pdf');
    }
}
