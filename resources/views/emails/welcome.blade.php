@component('mail::message')
Halo  **{{$user->nama_pendaftar}}** !   
Terimakasih telah melakukan pendaftaran lomba KAA 2020.  
Klik dibawah untuk verifikasi email.

@component('mail::button', ['url' => $link, 'color' => 'success'])
Verifikasi Email
@endcomponent

Apabila tombol diatas tidak berfungsi, klik link dibawah ini
<a href="{{$link}}">{{$link}}</a>
@endcomponent