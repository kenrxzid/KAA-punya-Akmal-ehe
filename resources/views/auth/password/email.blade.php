<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="{{asset('styles/admin_styles.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
    a, a:hover{
      color:#333
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col">
                <h1 class="judulhalaman text-center">Reset Password</h1>
            </div>
        </div>
        <!-- <div class="row"> -->
            <div class="card p-1 m-3">
                <div class="card-body">
                    @if(session('sentpassword'))
                    <div class="alert alert-success" role="alert">
                        Link untuk reset password berhasil dikirim ke email anda.
                    </div>
                    @elseif(session('sentfailed'))
                        <div class="alert alert-danger" role="alert">
                            Gagal mengirim email. Tidak ditemukan pengguna dengan email tersebut.
                        </div>
                        <form class="d-inline" method="POST" action="{{ url('password/sendmail') }}">
                            @csrf
                            <label for="email"x>Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email akun Anda">
                            <input type="submit" class="btn btn-primary mt-3 align-baseline" value="Submit">
                        </form>
                        @else
                        <form class="d-inline" method="POST" action="{{ url('password/sendmail') }}">
                            @csrf
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email akun Anda">
                            <input type="submit" class="btn btn-primary mt-3 align-baseline" value="Submit">
                        </form>
                    @endif
                </div>
            </div>
            
        <!-- </div> -->
    </div>
</body>
<!-- Bootstrap Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</html>

