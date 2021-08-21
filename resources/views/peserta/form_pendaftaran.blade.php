<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/form_pendaftaran.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <tr>
                <a href="/peserta/dashboard_user" class="menu1">Dashboard</a>
                <a href="/peserta/alur_pembayaran" class="menu2">Alur Pembayaran</a>
                <a href="/peserta/konfirmasi_pembayaran" class="menu3">Konfirmasi Pembayaran</a>
                <a href="/peserta/form_pendaftaran" class="menu4">Form Pendaftaran</a>
                <a href="/peserta/cetak_kartu_peserta" class="menu5">Cetak Kartu Peserta</a>
            </tr>
        </div>
        <div class="conten">
            <div class="bungkus">
                <h2>FORM PENDAFTARAN</h2>
                
                @if(Auth::user()->pendaftaran->status_pendaftaran == 1 && Auth::user()->pendaftaran->pembayarans->status_pembayaran == 1)
                <h3>
                 Pendaftaranmu telah diterima. Silahkan mencetak kartu peserta </h3>

                @elseif(Auth::user()->pendaftaran->pembayarans->status_pembayaran == 1)
                <form method="post" action="/peserta/form_pendaftaran" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                @if(session()->has('success'))
                <div style="text-align:center; border-radius:20px" class="alert alert-success alert-dismissible">
                <strong>{{ session('success') }}</strong>
                </div>
                @endif

                    <input type="text" class="nama_pendaftar" id="nama_pendaftar"
                    placeholder="Masukan Nama" name="nama_pendaftar" value="{{ auth()->user()->pendaftaran->nama_pendaftar}}" disabled required>

                    <input type="text" class="asal_daerah" id="asal_daerah"
                    placeholder="Masukan Asal Daerah" name="asal_daerah" value="{{ old('asal_daerah') }}" required>

                    <input type="text" class="asal_univ_pendaftar" id="asal_univ_pendaftar"
                    placeholder="Masukan Asal Universitas" name="asal_univ_pendaftar" value="{{ auth()->user()->pendaftaran->asal_univ_pendaftar}}" disabled required>

                    <input type="email" class="email_pendaftar" id="email_pendaftar"
                    placeholder="Masukan Email" name="email_pendaftar" value="{{ auth()->user()->pendaftaran->email_pendaftar}}" disabled required>

                    <input type="number" class="no_telepon_pendaftar" id="no_telepon_pendaftar"
                    placeholder="Masukan Nomor Telepon" name="no_telepon_pendaftar" value="{{ old('no_telepon_pendaftar') }}" required>

                    <input type="text" class="id_line_pendaftar" id="id_line_pendaftar"
                    placeholder="Masukan ID Line" name="id_line_pendaftar" value="{{ old('id_line_pendaftar') }}">

                    <label for="customer_id">Scan KTM</label><br>
                    <input type="file" class="scan_ktm" name="scan_ktm" id="scan_ktm" accept=".pdf,.jpeg,.png,.jpg" required><br><br>
                    
                    <label for="customer_id">Pas Foto</label><br>
                    <input type="file" class="pas_foto" name="pas_foto" id="pas_foto" accept=".jpeg,.png,.jpg" required><br><br>
                    
                    <label for="customer_id">Scan Surat Keterangan</label><br>
                    <input type="file" class="scan_suket_aktif" name="scan_suket_aktif" id="scan_suket_aktif" accept=".pdf"><br><br>

                    <button type="submit" class="btn">Submit</button>
                </form>
                @endif

            </div>
            <!-- <div class="telpon">Phone Number</div> -->
        </div>
    </div>
</body>
</html>