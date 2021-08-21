<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alur Pembayaran</title>
    <link rel="stylesheet" type="text/css" href="/css/alur_pembayaran.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <tr>
                <a href="/peserta/dashboard_user" class="menu1">Dashboard</a>
                <a href="/peserta/alur_pembayaran" class="menu2">Alur Pembayaran</a>
                <a href="/peserta/konfirmasi_pembayaran" class="menu3">Konfirmasi Pembayaran</a>

                @if(Auth::user()->pendaftaran->pembayarans != null)
                    @if(Auth::user()->pendaftaran->pembayarans->status_pembayaran == 1)
                    <!-- form pendaftaran muncul karena sudah bayar tapi belum dikonfirmasi -->
                    <a href="/peserta/form_pendaftaran" class="menu4">Form Pendaftaran</a>
                    @endif
                @endif

                <a href="/peserta/cetak_kartu_peserta" class="menu5">Cetak Kartu Peserta</a>
            </tr>
        </div>
        <div class="conten">
            <div class="bungkus">
                <h2>ALUR PEMBAYARAN</h2>
                    <p>1. Peserta di wajibkan mendaftarkan akun.</p>
                    <p>2. Peserta melakukan pembayaran via bank<br>
                    <b style="color: red;">- Mandiri : 142-00-1857432-6 a/n Ajeng Ayu Nurfitri.<br>
                    - BRI Syari’ah: 1039830651 a/n Hikmatus Saadah.<br></b>
                    lalu upload bukti pembayaran (.jpg).</p>
                    <p>3. Peserta menungu pihak panitia untuk memvalidasi pembayaran yang sudah dilakukan.</p>
                    <p>4. Peserta mengisi formulir yang telah disediakan, termasuk :
                    <br>- Scan Kartu Tanda Mahasiswa.
                    <br>- Pas foto berukuran 3x4.
                    <br>- Scan keterangan aktif dari fakultas untuk angkatan 2016 keatas.</p>
                    <p>5. Data yang inputkan harus data yang sebenar - benarnya.</p>
                    <p>6. Setelah itu peserta dapat mendownload kartu peserta.</p>
            </div>
            <!-- <div class="telpon">Phone Number</div> -->
        </div>
    </div>
</body>
</html>