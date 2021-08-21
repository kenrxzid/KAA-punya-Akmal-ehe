<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/regist.css')}}">
</head>

<body>
    <div class="flex">
        <div class="background">
            <q class="lgs">Let's Get Startedd</q>
        </div>
        <div class="container">
            <form method="post" action="/postregister">
                <h2 class="signin">Register</h2>
                {{ csrf_field() }}

                <table style="margin: auto;">
                    <tr>
                        <td>
                            <input type="text" class="username" id="username" placeholder="Masukan Username" name="username" required minlength="8" maxlength="15" value="{{ old('username') }}">
                        </td>
                    </tr>
                    <tr>
                        <td><small id="text-username"></small></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="nama_pendaftar" id="nama_pendaftar" placeholder="Masukan Nama Lengkap" name="nama_pendaftar" required minlength="3" maxlength="30" value="{{ old('nama_pendaftar') }}"></td>
                    </tr>
                    <tr>
                        <td><small id="text-nama"></small></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="asal_univ_pendaftar" id="asal_univ_pendaftar" placeholder="Masukan Asal Universitas" name="asal_univ_pendaftar" required minlength="8" maxlength="40" value="{{ old('asal_univ_pendaftar') }}"></td>
                    </tr>
                    <tr>
                        <td><small id="text-univ"></small>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="email" class="email_pendaftar" id="email_pendaftar" placeholder="Masukan Email" name="email_pendaftar" required minlength="8" maxlength="50" value="{{ old('email_pendaftar') }}"></td>
                    </tr>
                    <tr>
                        <td><small id="text-email"></small>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="password" class="password_user" id="password_user" placeholder="Masukan Password" name="password_user" required minlength="8"></td>
                    </tr>
                    <tr>
                        <td><small id="text-password"></small>
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn" id="btn-daftar">Daftar</button></td>
                    </tr>
                </table>
                <p>Sudah daftar ? <a href="{{url('/login')}}">Login disini.</a></p>
            </form>
        </div>
    </div>
</body>
<!-- JQuery Script -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#username').on('keydown', function(e) {
            if (e.key === ' ' || e.key === 'Spacebar' || e.keyCode == 32) {
                $('#username').val($('#username').val().replace(/[^\d]/g, ''));
                return false;
            }
        });
        $("#username").on("input", function() {
            $("#username").val($("#username").val().toLowerCase());
            if ($("#username").val().length >= 5) {
                $.ajax({
                    type: 'GET',
                    url: "{{url('/cekusername/')}}" + "/" + $("#username").val(),
                    success: function(results) {
                        if (results.success === true) {
                            $("#text-username").html("Username telah terpakai");
                            $("#btn-daftar").prop('disabled', true);
                        } else {
                            $("#text-username").html("Username dapat dipakai");
                            $("#btn-daftar").prop('disabled', false);
                        }
                    }
                });
            } else {
                $("#text-username").html("Minimal 5 karakter tanpa spasi");
                $("#btn-daftar").prop('disabled', true);
            }
        });
        $("#password_user").on("input", function() {
            if ($("#password_user").val().length > 5) {
                if ($("#password_user").val().length < 8) {
                    $("#text-password").html("Minimal 8 karakter");
                } else {
                    $("#text-password").html("");
                }
            }
        });
        $("#email_pendaftar").on("input", function() {
            if ($("#email_pendaftar").val().length > 5) {
                if ($("#email_pendaftar").val().length < 8) {
                    $("#text-email").html("Minimal 8 karakter");
                } else {
                    $("#text-email").html("");
                }
            }
        });
        $("#email_pendaftar").on("input", function() {
            if ($("#email_pendaftar").val().length > 5) {
                if ($("#email_pendaftar").val().length < 8) {
                    $("#text-email").html("Minimal 8 karakter");
                } else {
                    $("#text-email").html("");
                }
            }
        });
        $("#asal_univ_pendaftar").on("input", function() {
            if ($("#asal_univ_pendaftar").val().length > 5) {
                if ($("#asal_univ_pendaftar").val().length < 8) {
                    $("#text-univ").html("Minimal 8 karakter");
                } else {
                    $("#text-univ").html("");
                }
            }
        });
        $("#nama_pendaftar").on("input", function() {
            if ($("#nama_pendaftar").val().length < 3) {

                $("#text-nama").html("Minimal 3 karakter");

            } else {

                $("#text-nama").html("");
            }
        });
    });
</script>

</html>