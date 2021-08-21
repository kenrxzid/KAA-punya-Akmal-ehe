<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('styles/admin_styles.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
    a, a:hover{
      color:#333
    }
    </style>
    <title>Verifikasi Email</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col">
                <h1 class="judulhalaman text-center">Verifikasi Email</h1>
            </div>
        </div>
        <!-- <div class="row"> -->
            <div class="card p-1 m-3">
                <div class="card-body">
                    @if(session('resent'))
                    <div class="alert alert-success" role="alert">
                        Link verifikasi Anda telah berhasil dikirim ulang.
                    </div>
                    @endif
                    <h5>Kami sudah mengirim link untuk verifikasi email Anda. Mohon periksa kotak masuk email Anda.</h5>
                    <br>
                
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        Namun, apabila Anda tidak menerima email tersebut,
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">klik disini untuk mengirim ulang</button>.
                    </form>
                </div>
            </div>
            
        <!-- </div> -->
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Bootstrap Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</html>

