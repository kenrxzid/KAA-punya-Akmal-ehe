<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <img src="/public/undraw_welcome_cats_thqn.svg" alt=""> -->
</head>

<body>
    <div class="flex">
        <div class="background"></div>
        <div class="row">
            <form method="POST" action="{{ route('login') }}">
                <h2 class="signin">Login</h2>
                {{ csrf_field() }}
                <input type="text" name="username" id="username" class="username" placeholder="Masukan Username" required>
                <br>
                <input type="password" name="password" id="password_user" class="password_user" placeholder="Masukan Password" required>
                <br>
                <p><a href="{{ url('/password/reset') }}">Lupa Password?</a></p>
                <br>
                <button type="submit" class="btn">Sign In</button>
                <p>Tidak punya akun? <a href="{{ url('/register') }}">Daftar disini.</a></p>
            </form>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<!-- Bootstrap Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>