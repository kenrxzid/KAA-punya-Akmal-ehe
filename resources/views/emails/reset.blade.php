@component('mail::message')
Halo  **{{$user->nama_pendaftar}}** !   
Klik tombol dibawah untuk reset password akun Anda.

@component('mail::button', ['url' => $link, 'color' => 'success'])
Reset Password
@endcomponent

Apabila tombol diatas tidak berfungsi, klik link dibawah ini
<a href="{{$link}}">{{$link}}</a>
@endcomponent