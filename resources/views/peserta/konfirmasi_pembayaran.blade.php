<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/konfirmasi_pembayaran.css')}}">
</head>
<body>
    <div class="container">
        <div class="header">
            <tr>
                <a href="{{ url('/peserta/dashboard_user')}}" class="menu1">Dashboard</a>
                <a href="{{ url('/peserta/alur_pembayaran')}}" class="menu2">Alur Pembayaran</a>
                <a href="{{ url('/peserta/konfirmasi_pembayaran')}}" class="menu3">Konfirmasi Pembayaran</a>
                
                @if(Auth::user()->pendaftaran->pembayarans != null)
                    @if(Auth::user()->pendaftaran->pembayarans->status_pembayaran == 1)
                    <!-- form pendaftaran muncul karena sudah bayar tapi belum dikonfirmasi -->
                    <a href="{{ url('/peserta/form_pendaftaran')}}" class="menu4">Form Pendaftaran</a>
                    @endif
                @endif

                <a href="{{ url('/peserta/cetak_kartu_peserta')}}" class="menu5">Cetak Kartu Peserta</a>
            </tr>
        </div>
        <div class="conten">
            <div class="bungkus">
                <h2>KONFIRMASI PEMBAYARAN</h2>
                @if(Auth::user()->pendaftaran->pembayarans != null && Auth::user()->pendaftaran->pembayarans->status_pembayaran == 1)
                    <h3 style="text-align: center; padding: 10px;"> Pembayaranmu telah diterima. Langkah selanjutnya yaitu melengkapi data pada form pendaftaran. </h3>
                @elseif(Auth::user()->pendaftaran->pembayarans != null && Auth::user()->pendaftaran->pembayarans->status_pembayaran == 0)
                <h3 style="text-align: center; padding: 10px;"> Pembayaranmu sedang dalam proses verifikasi. Mohon tunggu email selanjutnya dan cek website secara berkala. </h3>
                @elseif(session()->has('success'))
                <div style="text-align:center; border-radius:20px" class="alert alert-success alert-dismissible">
                <strong>{{ session('success') }}</strong>
                </div>
                @elseif(Auth::user()->pendaftaran->pembayarans == null || Auth::user()->pendaftaran->pembayarans->status_pembayaran == 2)
                <form method="post" action="{{ url('/peserta/konfirmasi_pembayaran')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <input type="text" class="atas_nama_rekening" id="atas_nama_rekening"
                    placeholder="Masukan Atas Nama Rekening" name="atas_nama_rekening" value="{{ old('atas_nama_rekening') }}" required maxlength="50">

                    <input type="text" class="bank_asal" id="bank_asal"
                    placeholder="Masukan Bank Asal" name="bank_asal" value="{{ old('bank_asal') }}" required maxlength="25">

                    <input type="number" class="nomor_rekening" id="nomor_rekening"
                    placeholder="Masukan Nomor Rekening" name="nomor_rekening" value="{{ old('nomor_rekening') }}" required>

                    <input type="number" class="total_pembayaran" id="total_pembayaran"
                    placeholder="Masukan Total Pembayaran" name="total_pembayaran" value="{{ old('total_pembayaran') }}" required>

                    <label>Bukti Pembayaran</label><br>
                    <input type="file" class="bukti_pembayaran" name="bukti_pembayaran" id="bukti_pembayaran" required accept=".jpg,.jpeg,.png"><br><br>

                    <button type="submit" class="btn">Submit</button>
                </form>
                @endif

            </div>
        </div>
    </div>
</body>
</html>