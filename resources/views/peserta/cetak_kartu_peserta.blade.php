<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Peserta</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/cetak_kartu_peserta.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <tr>
                <a href="{{ url('/peserta/dashboard_user') }}" class="menu1">Dashboard</a>
                <a href="{{ url('/peserta/alur_pembayaran') }}" class="menu2">Alur Pembayaran</a>
                <a href="{{ url('/peserta/konfirmasi_pembayaran') }}" class="menu3">Konfirmasi Pembayaran</a>

                @if(Auth::user()->pendaftaran->pembayarans != null)
                    @if(Auth::user()->pendaftaran->pembayarans->status_pembayaran == 1)
                    <!-- form pendaftaran muncul karena sudah bayar tapi belum dikonfirmasi -->
                    <a href="{{ url('/peserta/form_pendaftaran') }}" class="menu4">Form Pendaftaran</a>
                    @endif
                @endif

                <a href="{{ url('/peserta/cetak_kartu_peserta') }}" class="menu5">Cetak Kartu Peserta</a>
            </tr>
        </div>
        <div class="conten">
                <div class="bungkus">
                <h2>CETAK KARTU PESERTA</h2>
                @if(Auth::user()->pendaftaran->status_pendaftaran == 1)
                <a type="submit" class="btn" href="{{ url('/exportpdf') }}">Print</a>
                @else
                <h3 style="text-align: center; padding: 10px;">Untuk saat ini kartu peserta belum bisa dilihat karena data pendaftaran Anda belum lengkap. Silahkan isi form pendaftaran.</h3>
                @endif
            </div>
        </div>
    </div>
</body>
</html>