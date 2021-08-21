<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<title>@yield('Judul')</title>
	@yield('style')
	@yield('links')
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		.footer-copyright{
			background-color: #8BBF99;
			color: white;
		}
	</style>
</head>
<body>
	@yield('nav')
	<div class="container-fluid" style="min-height: 1000px">
		@yield('body')
	</div>
	<!-- Footer -->
<footer class="page-footer font-small blue pt-5">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
  	© 2020 Copyright <b>Himpunan Mahasiswa D3 Akuntansi Universitas Airlangga</b>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
	<!-- Footer -->
	<!-- JQuery Script -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<!-- Bootstrap Script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	@yield('script')
</body>
</html>