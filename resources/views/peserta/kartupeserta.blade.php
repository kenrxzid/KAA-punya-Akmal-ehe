<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
    .container2{
        background-color: white;
        display: block;
        width: 500px;
        height: 600px;
        margin: auto;
        padding: 15px;
    }
    .logo{
        display: block;
        height: 30%;
        width: 100%;
    }
    .judul{
        text-align: center;
        font-size: 35px;
        color: #8BBF99;
        margin-top: 20px;
        margin-bottom: 30px;
    }
    .content{
        padding: 15px;
        background-color: rgb(245, 245, 245, 0.6);
        border-radius: 5px;
        text-align: center;
    }
    .content h4{
        font-size: 18px;
        margin-bottom: 15px;
    }
    .content p{
        text-decoration: underline;
        font-size: 18px;
        margin-bottom: 15px;
    }
    </style>
</head>
<body>
    <div class="container2">

        <div class="logo">
        <img src="{{ asset("assets/images/logo.png") }}" 
        style="width:300px;height:300px;left:40%;position:absolute;">
        </div>

        <div class="judul"><b>Kompetisi Akuntansi Airlangga</b></div>

        <div class="background">
            <div class="content">
                <p>Nama :</p>
                <h4>{{ auth()->user()->pendaftaran->nama_pendaftar}}</h4>
                <p>Universitas :</p>
                <h4>{{ auth()->user()->pendaftaran->asal_univ_pendaftar}}</h4>
                <p>Username :</p>
                <h4>{{ auth()->user()->username }}</h4>
                <p>Password :</p>
                <h4>{{ $akun->password_moodle }}</h4>
            </div>
        </div>

    </div>
    
</body>
</html>