<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="{{asset('styles/admin_styles.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                    @if(session('reset'))
                    <div class="alert alert-danger" role="alert">
                        Link ini sudah kadaluarsa.
                    </div>
                    <a href="{{url('password/reset')}}"><button class="btn btn-link">Klik disini untuk mengirim ulang.</button></a>
                    @elseif(session('notfound'))
                    <div class="alert alert-success" role="alert">
                        Reset Password Berhasil.
                    </div>
                    <a href="{{url('/login')}}"><button class="btn btn-link">Klik disini untuk masuk.</button></a>
                    @else
                        <form action="{{url('/password/reset')}}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                          <div class="form-group">
                            <label>Password Baru</label>
                            <div class="input-group">
                              <input class="form-control" type="password" id="pwnew" required name="password" minlength="8">
                              <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                              </div>
                            </div>
                            <small class="form-text text-muted text-red mb-3">Minimal 8 karakter</small>
                          </div>
                          <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <div class="input-group">
                              <input class="form-control" type="password" id="pwnew2" required name="konfirmpassword" minlength="8">
                              <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                              </div>
                            </div>
                            <small class="form-text text-muted text-red mb-3">Minimal 8 karakter</small>
                          </div>
                          <small id="konfirmasi" class="form-text text-muted text-red mb-3">Password Baru dan Konfirmasi Password Baru tidak sama.</small>
                          <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
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
<script type="text/javascript">
        $("#basic-addon2").on('click', function(event) {
            event.preventDefault();
            if($('#pwnew').attr("type") == "text"){
                $('#pwnew').attr('type', 'password');
                $('#basic-addon2 i').addClass( "fa-eye-slash" );
                $('#basic-addon2 i').removeClass( "fa-eye" );
            }else if($('#pwnew').attr("type") == "password"){
                $('#pwnew').attr('type', 'text');
                $('#basic-addon2 i').removeClass( "fa-eye-slash" );
                $('#basic-addon2 i').addClass( "fa-eye" );
            }
        });
        $("#basic-addon3").on('click', function(event) {
            event.preventDefault();
            if($('#pwnew2').attr("type") == "text"){
                $('#pwnew2').attr('type', 'password');
                $('#basic-addon3 i').addClass( "fa-eye-slash" );
                $('#basic-addon3 i').removeClass( "fa-eye" );
            }else if($('#pwnew2').attr("type") == "password"){
                $('#pwnew2').attr('type', 'text');
                $('#basic-addon3 i').removeClass( "fa-eye-slash" );
                $('#basic-addon3 i').addClass( "fa-eye" );
            }
        });
        $("#konfirmasi").hide();

        $("#pwnew2").on('input',function(){
            if($(this).val().length > 7){
                if($(this).val() === $("#pwnew").val()){
                    $("#konfirmasi").hide();
                    $("#submit-btn").attr('disabled', false);
                }
                else{
                    $("#konfirmasi").show();
                    $("#submit-btn").attr('disabled', true);
                }
            }
        });
</script>
</html>