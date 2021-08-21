@extends('admin.master_admin')
@section('judul','Data Pendaftar')
@section('links-admin')
<link rel="stylesheet" type="text/css" href="{{asset('/styles/data_pendaftar_styles.css')}}">
@endsection
@section('body-admin')
<div class="row m-1 mb-4">
	<div class="card card-body" id="card-atas">
		<div class="row">
			<div class="col-9" id="welcome">
				<h1 id="welcometext">Welcome Back, Dea!</h1>
				<h3 id="welcomemenu">Data Pendaftar</h3>
			</div>
		</div>
	</div>
</div>
<div class="row ml-3">
	<h1 class="judulhalaman">Pendaftar</h1>
</div>
<nav id="nav-data-pendaftar">
	<div class="nav nav-tabs" id="nav-tab-pendaftar" role="tablist">
	<a class="ml-4 nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">Semua</a>

	<a class="ml-4 nav-item nav-link" id="navpeserta-tab" data-toggle="tab" href="#navpeserta" role="tab" aria-controls="navpeserta" aria-selected="false">Peserta</a>

	<a class="ml-4 nav-item nav-link" id="nav-pendaftar-tab" data-toggle="tab" href="#nav-pendaftar" role="tab" aria-controls="nav-pendaftar" aria-selected="false">Pendaftar</a>

	
	</div>
</nav>
<div class="row">
	<div class="tab-content" id="nav-tab-pendaftarContent">
	  <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
	  	<div class="container-fluid">
	  		<!-- Search dan Tombol Download -->
	  		<div class="row justify-content-between mb-4" class="atas-table-home">
	  			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
	  				<form id="search-all">
	  					<input type="text" name="search-all" placeholder="Search" id="searchall">
	  				</form>
	  			</div>
	  			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-right">
	  				<a href="{{url('/admin/export/semua')}}"><button class="btn text-right download-btn px-4 mt-3 mt-sm-0 mt-md-0 mt-lg-0 mt-xl-0" id="download-dash-btn"><img class="align-top mr-2" src="{{asset('/assets/icons/download-icon.svg')}}"><span class="btn-text">Unduh Data</span></button></a>
	  			</div>
		  	</div>
		  	<!-- End of Search dan Tombol Download -->
		  	<!-- Header -->
		  	<div class="row p-2 table-header" id="table-home-header">
		  		<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block">ID Pendaftaran</div>
		  		<div class="col-3 col-lg-2 col-md-3">Nama</div>
		  		<div class="col-2 col-lg-2 col-md-3 d-none d-xl-block d-lg-block d-md-block d-sm-block">Asal Universitas</div>
		  		<div class="col-2 d-none d-xl-block">Email</div>
		  		<div class="col-2 col-lg-3 col-md-3">Status</div>
		  	</div>
		  	<!-- End of Header -->
		  	<!-- Data Pendaftar -->
		  	@foreach($all as $d)
			<div class="row mt-3 data-row-konfirmasi align-items-center data-semua" id="datasemua-{{$d->id_pendaftaran}}">
				<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="data-semua nopendaftaran searchable" id="nopendaftaran-{{$d->id_pendaftaran}}">{{$d->id_pendaftaran}}</span></div>
				<div class="col-3 col-lg-2 col-md-3"><span class="data-semua nama searchable" id="nama-{{$d->id_pendaftaran}}">{{$d->nama_pendaftar}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="data-semua univ searchable" id="univ-{{$d->id_pendaftaran}}">{{$d->asal_univ_pendaftar}}</span></div>
				<div class="col-2 d-none d-xl-block"><span class="data-semua email searchable" id="email-{{$d->id_pendaftaran}}">{{$d->email_pendaftar}}</span></div>
				<div class="col-4 col-md-3 col-lg-3">
					<div class="row mb-2">
						<span class="badge
						@if($d->status_pembayaran >= 0)
							@if($d->status_pembayaran == 1)
							badge-success
							@elseif($d->status_pembayaran == 2)
							badge-danger
							@else
							badge-danger
							@endif
						@else
						badge-danger
						@endif
						statusdaftar">
							@if($d->status_pembayaran >= 0)
								@if($d->status_pembayaran == 1)
								Diterima
								@elseif($d->status_pembayaran == 2)
								Ditolak
								@elseif($d->status_pembayaran == 0)
								Menunggu Verifikasi
								@endif
							@else
							Belum Konfirmasi
							@endif
						</span>
					</div>
					<div class="row">
						<span class="badge @if($d->status_pendaftaran == 1)
							badge-success
							@else
							badge-danger
							@endif statusdata">
							@if($d->status_pendaftaran)
							Data Lengkap
							@else
							Data belum lengkap
							@endif
						</span>
					</div>
				</div>
				<!-- Button dan Card yang benar -->
				<div class="col col-md-1 col-lg-1 col-xl-1 col-sm-1 text-right"><span class="drop" id="drop" data-toggle="collapse" data-target="#data-semuadrop{{$d->id_pendaftaran}}" aria-expanded="false" aria-controls="data-semuadrop{{$d->id_pendaftaran}}"></span></div>
				<div class="collapse mt-3" id="data-semuadrop{{$d->id_pendaftaran}}" style="width: 100%;">
				  <div class="card card-body card-drop">
				  	<div class="row">
					    <div class="col-xl-5 mb-sm-3 mb-md-3 mb-lg-3">
					    	<div class="row drop-nopendaftar">{{$d->id_pendaftaran}}</div>
					    	<div class="row dropdata drop-nama"><span class="icon icon-nama"></span>{{$d->nama_pendaftar}}</div>
					    	<div class="row dropdata drop-email"><span class="icon icon-email"></span>{{$d->email_pendaftar}}</div>
					    	<div class="row">
					    		<div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-6 dropdata drop-notelp p-0"><span class="icon icon-telp"></span>@if($d->no_telepon_pendaftar == null)
								-
								@else
								{{ $d->no_telepon_pendaftar }}
								@endif</div>
					    		<div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-6 dropdata drop-line p-0"><span class="icon icon-line"></span>@if($d->id_line_pendaftar == null)
								-
								@else
								{{ $d->id_line_pendaftar }}
								@endif</div>
					    	</div>
					    	<div class="row dropdata drop-kota"><span class="icon icon-kota"></span>
					    		@if($d->asal_daerah == null)
								-
								@else
								{{ $d->asal_daerah }}
								@endif</div>
					    	<div class="row dropdata drop-univ"><span class="icon icon-univ"></span>{{$d->asal_univ_pendaftar}}</div>
					    </div>
					    <div class="col-xl-7">
					    	<div class="card card-body card-drop card-berkas" id="berkas3">
					    		<div class="row">
					    			<h1 class="judulcard">Berkas</h1>
					    		</div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Scan KTM
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge 
					    				@if($d->scan_ktm != null)
										badge-success
										@else
										badge-danger
										@endif">
					    				@if($d->scan_ktm != null)
										Tersedia
										@else
										Belum Diupload
										@endif
										</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/scan_ktm/'.$d->id_pendaftaran.'/view')}}" target="_blank"><button class="btn btn-secondary"@if($d->scan_ktm == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/scan_ktm/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->scan_ktm == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    		<div class="dropdown-divider"></div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Pas Foto
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge @if($d->pas_foto != null)
										badge-success
										@else
										badge-danger
										@endif">@if($d->pas_foto != null)
										Tersedia
										@else
										Belum Diupload
										@endif</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/pas_foto/'.$d->id_pendaftaran.'/view')}}"  target="_blank"><button class="btn btn-secondary"@if($d->pas_foto == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/pas_foto/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->pas_foto == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    		<div class="dropdown-divider"></div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Scan Keterangan
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge @if($d->scan_suket_aktif != null)
										badge-success
										@else
										badge-danger
										@endif">@if($d->scan_suket_aktif != null)
										Tersedia
										@else
										Belum Diupload
										@endif</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/scan_suket_aktif/'.$d->id_pendaftaran.'/view')}}"  target="_blank"><button class="btn btn-secondary" @if($d->scan_suket_aktif == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/scan_suket_aktif/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->scan_suket_aktif == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    	</div>
					    </div>
				    </div>
				  </div>
				</div>
				<!-- End of Button dan Card yang benar -->
			</div>
			<div class="dropdown-divider data-semua" id="dividersemua-{{$d->id_pendaftaran}}"></div>
			@endforeach
			<div class="row justify-content-center" id="nodatasemua">
				<h5 class="text-center mt-3">Data tidak ditemukan.</h5>
			</div>
			<div class="row justify-content-end">
				{{ $all->links() }}
			</div>
			<!-- End of Data Pendaftar -->
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="nav-pendaftar" role="tabpanel" aria-labelledby="nav-pendaftar-tab">
	  	<div class="container-fluid">
	  		<!-- Search dan Tombol Download -->
	  		<div class="row justify-content-between mb-4" class="atas-table-home">
	  			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
	  				<form id="search-pendaftar">
	  					<input type="text" name="search-pendaftar" placeholder="Search" id="searchpendaftar">
	  				</form>
	  			</div>
	  			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-right">
	  				<a href="{{url('/admin/export/pendaftar')}}"><button class="btn text-right download-btn px-4 mt-3 mt-sm-0 mt-md-0 mt-lg-0 mt-xl-0" id="download-dash-btn"><img class="align-top mr-2" src="{{asset('/assets/icons/download-icon.svg')}}"><span class="btn-text">Unduh Data</span></button></a>
	  			</div>
		  	</div>
		  	<!-- End of Search dan Tombol Download -->
		  	<!-- Header -->
		  	<div class="row p-2 table-header" id="table-home-header">
		  		<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block">ID Pendaftaran</div>
		  		<div class="col-3 col-lg-2 col-md-3">Nama</div>
		  		<div class="col-2 col-lg-2 col-md-3 d-none d-xl-block d-lg-block d-md-block d-sm-block">Asal Universitas</div>
		  		<div class="col-2 d-none d-xl-block">Email</div>
		  		<div class="col-2 col-lg-3 col-md-3">Status</div>
		  	</div>
		  	<!-- End of Header -->
		  	<!-- Data Pendaftar -->
		  	@foreach($pendaftar as $d)
			<div class="row mt-3 data-row-konfirmasi justify-content-between align-items-center data-pendaftar" id="datapendaftar-{{$d->id_pendaftaran}}">
				<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="data-pendaftar nopendaftaran searchable" id="nopendaftaran-{{$d->id_pendaftaran}}">{{$d->id_pendaftaran}}</span></div>
				<div class="col-3 col-lg-2 col-md-3"><span class="data-pendaftar nama searchable" id="nama-{{$d->id_pendaftaran}}">{{$d->nama_pendaftar}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="data-pendaftar univ searchable" id="univ-{{$d->id_pendaftaran}}">{{$d->asal_univ_pendaftar}}</span></div>
				<div class="col-2 d-none d-xl-block"><span class="data-pendaftar email searchable" id="email-{{$d->id_pendaftaran}}">{{$d->email_pendaftar}}</span></div>
				<div class="col-4 col-md-3 col-lg-3">
					<div class="row mb-2">
						<span class="badge
						@if($d->status_pembayaran >= 0)
							@if($d->status_pembayaran == 1)
							badge-success
							@elseif($d->status_pembayaran == 2)
							badge-danger
							@else
							badge-danger
							@endif
						@else
						badge-danger
						@endif
						statusdaftar">
							@if($d->status_pembayaran >= 0)
								@if($d->status_pembayaran == 1)
								Diterima
								@elseif($d->status_pembayaran == 2)
								Ditolak
								@elseif($d->status_pembayaran == 0)
								Menunggu Verifikasi
								@endif
							@else
							Belum Konfirmasi
							@endif
						</span>
					</div>
					<div class="row">
						<span class="badge @if($d->status_pendaftaran == 1)
							badge-success
							@else
							badge-danger
							@endif statusdata">
							@if($d->status_pendaftaran)
							Data Lengkap
							@else
							Data belum lengkap
							@endif
						</span>
					</div>
				</div>
				<!-- Button dan Card yang benar -->
				<div class="col col-md-1 col-lg-1 col-xl-1 col-sm-1 text-right"><span class="drop" id="drop" data-toggle="collapse" data-target="#data-pendaftardrop{{$d->id_pendaftaran}}" aria-expanded="false" aria-controls="data-pendaftardrop{{$d->id_pendaftaran}}"></span></div>
				<div class="collapse mt-3" id="data-pendaftardrop{{$d->id_pendaftaran}}" style="width: 100%;">
				  <div class="card card-body card-drop">
				  	<div class="row">
					    <div class="col-xl-5 mb-sm-3 mb-md-3 mb-lg-3">
					    	<div class="row drop-nopendaftar">{{$d->id_pendaftaran}}</div>
					    	<div class="row dropdata drop-nama"><span class="icon icon-nama"></span>
							@if($d->nama_pendaftar == null)
								-
								@else
								{{ $d->nama_pendaftar }}
								@endif</div>
					    	<div class="row dropdata drop-email"><span class="icon icon-email"></span>{{$d->email_pendaftar}}</div>
					    	<div class="row">
					    		<div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-6 dropdata drop-notelp p-0"><span class="icon icon-telp"></span>@if($d->no_telepon_pendaftar == null)
								-
								@else
								{{ $d->no_telepon_pendaftar }}
								@endif</div>
					    		<div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-6 dropdata drop-line p-0"><span class="icon icon-line"></span>@if($d->id_line_pendaftar == null)
								-
								@else
								{{ $d->id_line_pendaftar }}
								@endif</div>
					    	</div>
					    	<div class="row dropdata drop-kota"><span class="icon icon-kota"></span>@if($d->asal_daerah == null)
								-
								@else
								{{ $d->asal_daerah }}
								@endif</div>
					    	<div class="row dropdata drop-univ"><span class="icon icon-univ"></span>{{$d->asal_univ_pendaftar}}</div>
					    </div>
					    <div class="col-xl-7">
					    	<div class="card card-body card-drop card-berkas" id="berkas3">
					    		<div class="row">
					    			<h1 class="judulcard">Berkas</h1>
					    		</div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Scan KTM
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge 
					    				@if($d->scan_ktm != null)
										badge-success
										@else
										badge-danger
										@endif">
					    				@if($d->scan_ktm != null)
										Tersedia
										@else
										Belum Diupload
										@endif
										</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/scan_ktm/'.$d->id_pendaftaran.'/view')}}"  target="_blank"><button class="btn btn-secondary"@if($d->scan_ktm == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/scan_ktm/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->scan_ktm == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    		<div class="dropdown-divider"></div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Pas Foto
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge @if($d->pas_foto != null)
										badge-success
										@else
										badge-danger
										@endif">@if($d->pas_foto != null)
										Tersedia
										@else
										Belum Diupload
										@endif</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/pas_foto/'.$d->id_pendaftaran.'/view')}}"  target="_blank"><button class="btn btn-secondary"@if($d->pas_foto == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/pas_foto/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->pas_foto == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    		<div class="dropdown-divider"></div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Scan Keterangan
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge @if($d->scan_suket_aktif != null)
										badge-success
										@else
										badge-danger
										@endif">@if($d->scan_suket_aktif != null)
										Tersedia
										@else
										Belum Diupload
										@endif</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/scan_suket_aktif/'.$d->id_pendaftaran.'/view')}}"  target="_blank"><button class="btn btn-secondary" @if($d->scan_suket_aktif == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/scan_suket_aktif/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->scan_suket_aktif == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    	</div>
					    </div>
				    </div>
				  </div>
				</div>
				<!-- End of Button dan Card yang benar -->
			</div>
			<div class="dropdown-divider data-pendaftar" id="dividerpendaftar-{{$d->id_pendaftaran}}"></div>
			@endforeach
			<div class="row justify-content-center" id="nodatapendaftar">
				<h5 class="text-center mt-3">Data tidak ditemukan.</h5>
			</div>
			<div class="row justify-content-end">
				{{ $pendaftar->links() }}
			</div>
			<!-- End of Data Pendaftar -->
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="navpeserta" role="tabpanel" aria-labelledby="navpeserta-tab">
	  	<div class="container-fluid">
	  		<!-- Search dan Tombol Download -->
	  		<div class="row justify-content-between mb-4" class="atas-table-home">
	  			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
	  				<form id="search-peserta">
	  					<input type="text" name="search-peserta" placeholder="Search" id="searchpeserta">
	  				</form>
	  			</div>
	  			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-right">
	  				<a href="{{url('/admin/export/peserta')}}"><button class="btn text-right download-btn px-4 mt-3 mt-sm-0 mt-md-0 mt-lg-0 mt-xl-0" id="download-dash-btn"><img class="align-top mr-2" src="{{asset('/assets/icons/download-icon.svg')}}"><span class="btn-text">Unduh Data</span></button></a>
	  			</div>
		  	</div>
		  	<!-- End of Search dan Tombol Download -->
		  	<!-- Header -->
		  	<div class="row p-2 table-header" id="table-home-header">
		  		<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block">ID Pendaftaran</div>
		  		<div class="col-3 col-lg-2 col-md-3">Nama</div>
		  		<div class="col-2 col-lg-2 col-md-3 d-none d-xl-block d-lg-block d-md-block d-sm-block">Asal Universitas</div>
		  		<div class="col-2 d-none d-xl-block">Email</div>
		  		<div class="col-2 col-lg-3 col-md-3">Status</div>
		  	</div>
		  	<!-- End of Header -->
		  	<!-- Data Pendaftar -->
		  	@foreach($peserta as $d)
			<div class="row mt-3 data-row-konfirmasi justify-content-between align-items-center data-peserta" id="datapeserta-{{$d->id_pendaftaran}}">
				<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="data-peserta nopendaftaran searchable" id="nopendaftaran-{{$d->id_pendaftaran}}">{{$d->id_pendaftaran}}</span></div>
				<div class="col-3 col-lg-2 col-md-3"><span class="data-peserta nama searchable" id="nama-{{$d->id_pendaftaran}}">{{$d->nama_pendaftar}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="data-peserta univ searchable" id="univ-{{$d->id_pendaftaran}}">{{$d->asal_univ_pendaftar}}</span></div>
				<div class="col-2 d-none d-xl-block"><span class="data-peserta email searchable" id="email-{{$d->id_pendaftaran}}">{{$d->email_pendaftar}}</span></div>
				<div class="col-4 col-md-3 col-lg-3">
					<div class="row mb-2">
						<span class="badge
						@if($d->status_pembayaran >= 0)
							@if($d->status_pembayaran == 1)
							badge-success
							@elseif($d->status_pembayaran == 2)
							badge-danger
							@else
							badge-danger
							@endif
						@else
						badge-danger
						@endif
						statusdaftar">
							@if($d->status_pembayaran >= 0)
								@if($d->status_pembayaran == 1)
								Diterima
								@elseif($d->status_pembayaran == 2)
								Ditolak
								@elseif($d->status_pembayaran == 0)
								Menunggu Verifikasi
								@endif
							@else
							Belum Konfirmasi
							@endif
						</span>
					</div>
					<div class="row">
						<span class="badge @if($d->status_pendaftaran == 1)
							badge-success
							@else
							badge-danger
							@endif statusdata">
							@if($d->status_pendaftaran)
							Data Lengkap
							@else
							Data belum lengkap
							@endif
						</span>
					</div>
				</div>
				<!-- Button dan Card yang benar -->
				<div class="col col-md-1 col-lg-1 col-xl-1 col-sm-1 text-right"><span class="drop" id="drop" data-toggle="collapse" data-target="#data-pesertadrop{{$d->id_pendaftaran}}" aria-expanded="false" aria-controls="data-pesertadrop{{$d->id_pendaftaran}}"></span></div>
				<div class="collapse mt-3" id="data-pesertadrop{{$d->id_pendaftaran}}" style="width: 100%;">
				  <div class="card card-body card-drop">
				  	<div class="row">
					    <div class="col-xl-5 mb-sm-3 mb-md-3 mb-lg-3">
					    	<div class="row drop-nopendaftar">{{$d->id_pendaftaran}}</div>
					    	<div class="row dropdata drop-nama"><span class="icon icon-nama"></span>
							@if($d->nama_pendaftar == null)
								-
								@else
								{{ $d->nama_pendaftar }}
								@endif</div>
					    	<div class="row dropdata drop-email"><span class="icon icon-email"></span>{{$d->email_pendaftar}}</div>
					    	<div class="row">
					    		<div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-6 dropdata drop-notelp p-0"><span class="icon icon-telp"></span>@if($d->no_telepon_pendaftar == null)
								-
								@else
								{{ $d->no_telepon_pendaftar }}
								@endif</div>
					    		<div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-6 dropdata drop-line p-0"><span class="icon icon-line"></span>@if($d->id_line_pendaftar == null)
								-
								@else
								{{ $d->id_line_pendaftar }}
								@endif</div>
					    	</div>
					    	<div class="row dropdata drop-kota"><span class="icon icon-kota"></span>@if($d->asal_daerah == null)
								-
								@else
								{{ $d->asal_daerah }}
								@endif</div>
					    	<div class="row dropdata drop-univ"><span class="icon icon-univ"></span>{{$d->asal_univ_pendaftar}}</div>
					    </div>
					    <div class="col-xl-7">
					    	<div class="card card-body card-drop card-berkas" id="berkas3">
					    		<div class="row">
					    			<h1 class="judulcard">Berkas</h1>
					    		</div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Scan KTM
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge 
					    				@if($d->scan_ktm != null)
										badge-success
										@else
										badge-danger
										@endif">
					    				@if($d->scan_ktm != null)
										Tersedia
										@else
										Belum Diupload
										@endif
										</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/scan_ktm/'.$d->id_pendaftaran.'/view')}}"  target="_blank"><button class="btn btn-secondary"@if($d->scan_ktm == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/scan_ktm/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->scan_ktm == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    		<div class="dropdown-divider"></div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Pas Foto
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge @if($d->pas_foto != null)
										badge-success
										@else
										badge-danger
										@endif">@if($d->pas_foto != null)
										Tersedia
										@else
										Belum Diupload
										@endif</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/pas_foto/'.$d->id_pendaftaran.'/view')}}"  target="_blank"><button class="btn btn-secondary"@if($d->pas_foto == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/pas_foto/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->pas_foto == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    		<div class="dropdown-divider"></div>
					    		<div class="row align-items-center">
					    			<div class="col-12 col-md-3 col-lg-3 col-xl-4 col-sm-3">
					    				Scan Keterangan
					    			</div>
					    			<div class="col-12 col-md-3 col-lg-3 col-sm-3 col-xl-3">
					    				<span class="badge @if($d->scan_suket_aktif != null)
										badge-success
										@else
										badge-danger
										@endif">@if($d->scan_suket_aktif != null)
										Tersedia
										@else
										Belum Diupload
										@endif</span>
					    			</div>
					    			<div class="col-12 col-md-6 col-lg-6 col-sm-6 col-xl-5 my-3 my-sm-0 my-md-0 my-lg-0 my-xl-0">
					    				<a href="{{url('/admin/pendaftar/scan_suket_aktif/'.$d->id_pendaftaran.'/view')}}"  target="_blank"><button class="btn btn-secondary" @if($d->scan_suket_aktif == null)
										disabled
										@endif><span class="icon icon-view"></span>Pratinjau</button></a>
					    				<a href="{{url('/admin/pendaftar/scan_suket_aktif/'.$d->id_pendaftaran.'/download')}}"><button class="btn btn-primary"@if($d->scan_suket_aktif == null)
										disabled
										@endif><span class="icon icon-download"></span>Unduh</button></a>
					    			</div>
					    		</div>
					    	</div>
					    </div>
				    </div>
				  </div>
				</div>
				<!-- End of Button dan Card yang benar -->
			</div>
			<div class="dropdown-divider data-peserta" id="dividerpeserta-{{$d->id_pendaftaran}}"></div>
			@endforeach
			<div class="row justify-content-center" id="nodatapeserta">
				<h5 class="text-center mt-3">Data tidak ditemukan.</h5>
			</div>
			<div class="row justify-content-end">
				{{ $peserta->links() }}
			</div>
			<!-- End of Data Pendaftar -->
	  	</div>
	  </div>
	</div>
</div>

@endsection
@section('script-admin')
<script type="text/javascript">
	$(document).ready(function(){
		$(".menu-ul").each(function(){
			$(this).removeClass("active");
		});
		$(".data-menu").addClass("active");

		$("#nodatasemua").hide();
		$("#nodatapendaftar").hide();
		$("#nodatapeserta").hide();

		$("#searchall").on('input',function(){
			let found = false;
			if($(this).val().length > 2){
				$(".data-semua").hide();
				let searchterm = $(this).val().toLowerCase();
				$(".data-semua .searchable").each(function(index){
					if($(this).html().toLowerCase().includes(searchterm)){
						let id = $(this).attr('id').slice(-5);
						$("#datasemua-"+id).show();
						$("#datasemua-"+id+" .data-semua").show();
						$("#dividersemua-"+id).show();
						found = true;
						$("#nodatasemua").hide();
					}
				});
				if(!found){
					$("#nodatasemua").show();
				}
			}
			else{
				$(".data-semua").show();
				$("#nodatasemua").hide();
			}
		});

		$("#searchpendaftar").on('input',function(){
			let found = false;
			if($(this).val().length > 2){
				$(".data-pendaftar").hide();
				let searchterm = $(this).val().toLowerCase();
				$(".data-pendaftar .searchable").each(function(index){
					if($(this).html().toLowerCase().includes(searchterm)){
						let id = $(this).attr('id').slice(-5);
						$("#datapendaftar-"+id).show();
						$("#datapendaftar-"+id+" .data-pendaftar").show();
						$("#dividerpendaftar-"+id).show();
						found = true;
						$("#nodatapendaftar").hide();
					}
				});
				if(!found){
					$("#nodatapendaftar").show();
				}
			}
			else{
				$(".data-pendaftar").show();
				$("#nodatapendaftar").hide();
			}
		});

		$("#searchpeserta").on('input',function(){
			let found = false;
			if($(this).val().length > 2){
				$(".data-peserta").hide();
				let searchterm = $(this).val().toLowerCase();
				$(".data-peserta .searchable").each(function(index){
					if($(this).html().toLowerCase().includes(searchterm)){
						let id = $(this).attr('id').slice(-5);
						$("#datapeserta-"+id).show();
						$("#datapeserta-"+id+" .data-peserta").show();
						$("#dividerpeserta-"+id).show();
						found = true;
						$("#nodatapeserta").hide();
					}
				});
				if(!found){
					$("#nodatapeserta").show();
				}
			}
			else{
				$(".data-peserta").show();
				$("#nodatapeserta").hide();
			}
		});
	});
</script>
@endsection