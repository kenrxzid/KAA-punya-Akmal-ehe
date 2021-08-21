@component('mail::message')
Halo  **{{$user->nama_pendaftar}}** !   
Terimakasih telah melakukan konfirmasi pembayaran untuk pendaftaran lomba KAA 2020.  
Pembayaranmu telah diterima oleh kami.  
Langkah selanjutnya yaitu mengisi formulir pendaftaran dengan lengkap.

@component('mail::button', ['url' => $link, 'color' => 'success'])
Form Pendaftaran
@endcomponent

Apabila tombol diatas tidak berfungsi, klik link dibawah ini
<a href="{{$link}}">{{$link}}</a>
@endcomponent