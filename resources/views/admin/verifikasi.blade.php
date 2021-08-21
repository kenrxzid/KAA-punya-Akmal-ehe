@extends('admin.master_admin')
@section('judul','Verifikasi Pembayaran')
@section('links-admin')
<link rel="stylesheet" type="text/css" href="{{asset('/styles/data_pendaftar_styles.css')}}">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/xzoom/dist/xzoom.css">
@endsection
@section('body-admin')
<div class="row m-1 mb-4">
	<div class="card card-body" id="card-atas">
		<div class="row">
			<div class="col-9" id="welcome">
				<h1 id="welcometext">Welcome Back, Dea!</h1>
				<h3 id="welcomemenu">Verifikasi Pembayaran</h3>
			</div>
		</div>
	</div>
</div>
<div class="row ml-3">
	<h1 class="judulhalaman">Konfirmasi Pembayaran</h1>
</div>
<nav id="nav-data-pendaftar">
	<div class="nav nav-tabs" id="nav-tab-data-konfirmasi" role="tablist">
	<a class="ml-4 nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">Semua</a>

	<a class="ml-4 nav-item nav-link" id="navbelum-tab" data-toggle="tab" href="#nav-belum" role="tab" aria-controls="nav-belum" aria-selected="false">Butuh Verifikasi</a>

	<a class="ml-4 nav-item nav-link" id="nav-sudah-tab" data-toggle="tab" href="#nav-sudah" role="tab" aria-controls="nav-sudah" aria-selected="false">Terverifikasi</a>
	</div>
</nav>
<div class="row">
	<div class="tab-content" id="nav-tab-data-konfirmasi">
	  <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
	  	<div class="container-fluid">
	  		<!-- Search dan Tombol Download -->
	  		<div class="row justify-content-between mb-4" class="atas-table-home">
	  			<div class="col-4">
	  				<form id="search-all">
	  					<input type="text" name="search-all" placeholder="Search" id="searchall">
	  				</form>
	  			</div>
		  	</div>
		  	<!-- End of Search dan Tombol Download -->
		  	<!-- Header -->
		  	<div class="row p-2 table-header" id="table-home-header">
		  		<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block">ID Pendaftaran</div>
		  		<div class="col-3 col-lg-3 col-md-3 col-sm-3">Nama</div>
		  		<div class="col-2 d-none d-xl-block">Asal Universitas</div>
		  		<div class="col-2 col-xl-2 col-lg-3 col-md-3 col-sm-3 d-none d-xl-block d-lg-block d-md-block d-sm-block">Total</div>
		  		<div class="col-2 col-lg-2 col-md-3 col-sm-3">Status</div>
		  	</div>
		  	<!-- End of Header -->
		  	<!-- Data Pendaftar -->
		  	@foreach($datasemua as $d)
			<div class="row mt-3 data-row-konfirmasi align-items-center data-semua" id="datasemua-{{$d->id_pendaftaran}}">
				<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="nopendaftaran searchable" id="nopendaftaran-{{$d->id_pendaftaran}}">{{$d->id_pendaftaran}}</span></div>
				<div class="col-3"><span class="nama searchable" id="nama-{{$d->id_pendaftaran}}">{{$d->nama_pendaftar}}</span></div>
				<div class="col-2 d-none d-xl-block"><span class="univ searchable" id="univ-{{$d->id_pendaftaran}}">{{$d->asal_univ_pendaftar}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 col-sm-3 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="total">Rp {{number_format($d->total_pembayaran,0,',','.')}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 col-sm-3">
					<div class="row mb-2 ">
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
						statuspembayaran" id="status_pembayaran{{$d->id_pembayaran}}">
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
				</div>
				<!-- Button dan Card yang benar -->
				<div class="col col-md-1 col-lg-1 col-xl-1 col-sm-1 text-right"><span class="drop" id="drop{{$d->id_pendaftaran}}" data-toggle="collapse" data-target="#data-drop-semua{{$d->id_pendaftaran}}" aria-expanded="false" aria-controls="data-drop-semua{{$d->id_pendaftaran}}"></span></div>
				<div class="collapse mt-3" id="data-drop-semua{{$d->id_pendaftaran}}" style="width: 100%;">
				  <div class="card card-body card-drop">
				  	<div class="row">
					    <div class="col-xl-4">
					    	<div class="row drop-nopendaftar" id="drop-nopendaftar3">{{$d->id_pendaftaran}}</div>
					    	<div class="row dropdata drop-nama" id="drop-nama3"><span class="icon icon-nama"></span>{{$d->nama_pendaftar}}</div>
					    	<div class="row dropdata drop-email" id="drop-email3"><span class="icon icon-email"></span>{{$d->email_pendaftar}}</div>
					    	<div class="row">
					    		<div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-6 dropdata drop-notelp p-0"><span class="icon icon-telp"></span>@if($d->no_telepon_pendaftar == null)
								-
								@else
								{{$d->no_telepon_pendaftar}}
								@endif</div>
					    		<div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-6 dropdata drop-line p-0"><span class="icon icon-line"></span>@if($d->id_line_pendaftar == null)
								-
								@else
								{{$d->id_line_pendaftar }}
								@endif</div>
					    	</div>
					    	<div class="row dropdata drop-kota" id="drop-kota3"><span class="icon icon-kota"></span>@if($d->asal_daerah == null)
								-
								@else
								{{ $d->asal_daerah }}
								@endif</div>
					    	<div class="row dropdata drop-univ" id="drop-univ3"><span class="icon icon-univ"></span>{{$d->asal_univ_pendaftar}}</div>
					    	<div class="row dropdata">
					    		Telah melakukan pembayaran menggunakan rekening
					    	</div>
					    	<div class="row dropdata">
					    		<span><b>{{$d->bank_asal}}<br>
					    			Atas Nama : {{$d->atas_nama_rekening}}<br>
					    			No. Rek : {{$d->nomor_rekening}}
					    		</b>
					    		</span>
					    		<br>
					    	</div>
					    	<div class="row dropdata">
					    		<span>Pada <b>{{$d->tanggal_pembayaran}}</b></span>
					    	</div>
					    </div>
					    <div class="col-xl-4">
					    	<img class="xzoom img-fluid" src="{{url('storage/'.$d->bukti_pembayaran)}}" xoriginal="{{url('storage/'.$d->bukti_pembayaran)}}" style="max-height: 475px;width: auto;"/>
					    </div>
					    @if($d->status_pembayaran == 0)
					    <div class="col-xl-4 mt-sm-4 mt-md-4 mt-lg-4 mt-xl-0 mt-4" id="pertanyaan-{{$d->id_pembayaran}}">
					    	<div class="row">
					    		<div class="card card-body card-drop card-berkas">
					    		<div class="row justify-content-center">
					    			<h4 class="text-center pertanyaan-text">Apakah pembayaran sudah diterima dan sesuai?</h4>
					    		</div>
					    		<br>
					    		<div class="row justify-content-center">
					    			<button class="btn btn-secondary btn-lg btn-tidak mx-2 my-2" id="tidak-{{$d->id_pembayaran}}">Tidak</button>
					    			<button class="btn btn-primary btn-lg btn-ya mx-2  my-2" id="ya-{{$d->id_pembayaran}}">Ya</button>
					    		</div>
					    		<br>
					    		<div class="row justify-content-center mt-3">
					    			<h6 class="text-center">Aksi ini tidak dapat dikembalikan.</h6>
					    		</div>
					    	</div>
					    	</div>
					    	
					    </div>
					    @endif
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
				{{ $datasemua->links() }}
			</div>
			<!-- End of Data Pendaftar -->
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="nav-belum" role="tabpanel" aria-labelledby="nav-belum-tab">
	  	<div class="container-fluid">
	  		<!-- Search dan Tombol Download -->
	  		<div class="row justify-content-between mb-4" class="atas-table-home">
	  			<div class="col-4">
	  				<form id="search-belum">
	  					<input type="text" name="search-belum" placeholder="Search" id="searchbelum">
	  				</form>
	  			</div>
		  	</div>
		  	<!-- End of Search dan Tombol Download -->
		  	<!-- Header -->
		  	<div class="row p-2 table-header" id="table-home-header">
		  		<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block">ID Pendaftaran</div>
		  		<div class="col-3 col-lg-3 col-md-3 col-sm-3">Nama</div>
		  		<div class="col-2 d-none d-xl-block">Asal Universitas</div>
		  		<div class="col-2 col-xl-2 col-lg-3 col-md-3 col-sm-3 d-none d-xl-block d-lg-block d-md-block d-sm-block">Total</div>
		  		<div class="col-2 col-lg-2 col-md-3 col-sm-3">Status</div>
		  	</div>
		  	<!-- End of Header -->
		  	<!-- Data Pendaftar -->
		  	@foreach($databelum as $d)
			<div class="row mt-3 data-row-konfirmasi justify-content-between align-items-center data-belum" id="databelum-{{$d->id_pendaftaran}}">
				<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="nopendaftaran searchable" id="nopendaftaran-{{$d->id_pendaftaran}}">{{$d->id_pendaftaran}}</span></div>
				<div class="col-3"><span class="nama searchable" id="nama-{{$d->id_pendaftaran}}">{{$d->nama_pendaftar}}</span></div>
				<div class="col-2 d-none d-xl-block"><span class="univ searchable" id="univ-{{$d->id_pendaftaran}}">{{$d->asal_univ_pendaftar}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 col-sm-3 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="total">Rp {{number_format($d->total_pembayaran,0,',','.')}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 col-sm-3">
					<div class="row mb-2 ">
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
						statuspembayaran" id="status_pembayaranbelum{{$d->id_pembayaran}}">
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
				</div>
				<!-- Button dan Card yang benar -->
				<div class="col col-md-1 col-lg-1 col-xl-1 col-sm-1 text-right"><span class="drop" id="drop{{$d->id_pendaftaran}}" data-toggle="collapse" data-target="#data-belum{{$d->id_pendaftaran}}" aria-expanded="false" aria-controls="data-belum{{$d->id_pendaftaran}}"></span></div>
				<div class="collapse mt-3" id="data-belum{{$d->id_pendaftaran}}" style="width: 100%;">
				  <div class="card card-body card-drop">
				  	<div class="row">
					    <div class="col-xl-4">
					    	<div class="row drop-nopendaftar" id="drop-nopendaftar3">{{$d->id_pendaftaran}}</div>
					    	<div class="row dropdata drop-nama" id="drop-nama3"><span class="icon icon-nama"></span>{{$d->nama_pendaftar}}</div>
					    	<div class="row dropdata drop-email" id="drop-email3"><span class="icon icon-email"></span>{{$d->email_pendaftar}}</div>
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
					    	<div class="row dropdata drop-kota" id="drop-kota3"><span class="icon icon-kota"></span>@if($d->asal_daerah == null)
								-
								@else
								{{ $d->asal_daerah }}
								@endif</div>
					    	<div class="row dropdata drop-univ" id="drop-univ3"><span class="icon icon-univ"></span>{{$d->asal_univ_pendaftar}}</div>
					    	<div class="row dropdata">
					    		Telah melakukan pembayaran menggunakan rekening
					    	</div>
					    	<div class="row dropdata">
					    		<span><b>{{$d->bank_asal}}<br>
					    			Atas Nama : {{$d->atas_nama_rekening}}<br>
					    			No. Rek : {{$d->nomor_rekening}}
					    		</b>
					    		</span>
					    		<br>
					    	</div>
					    	<div class="row dropdata">
					    		<span>Pada <b>{{$d->tanggal_pembayaran}}</b></span>
					    	</div>
					    </div>
					    <div class="col-xl-4">
					    	<img class="xzoom img-fluid" src="{{url('storage/'.$d->bukti_pembayaran)}}" xoriginal="{{url('storage/'.$d->bukti_pembayaran)}}" style="max-height: 475px;width: auto;"/>
					    </div>
					    @if($d->status_pembayaran == 0)
					    <div class="col-xl-4 mt-sm-4 mt-md-4 mt-lg-4" id="pertanyaan-belum-{{$d->id_pembayaran}}">
					    	<div class="row">
					    		<div class="card card-body card-drop card-berkas">
					    		<div class="row justify-content-center">
					    			<h4 class="text-center pertanyaan-text">Apakah pembayaran sudah diterima dan sesuai?</h4>
					    		</div>
					    		<br>
					    		<div class="row justify-content-center mt-3">
					    			<div class="col-4 text-right">
					    				<button class="btn btn-secondary btn-lg btn-tidak-belum" id="tidak-belum-{{$d->id_pembayaran}}">Tidak</button>
					    			</div>
					    			<div class="col-4 text-left">
					    				<button class="btn btn-primary btn-lg btn-ya-belum" id="ya-belum-{{$d->id_pembayaran}}">Ya</button>
					    			</div>
					    		</div>
					    		<br>
					    		<div class="row justify-content-center mt-3">
					    			<h6 class="text-center">Aksi ini tidak dapat dikembalikan.</h6>
					    		</div>
					    	</div>
					    	</div>
					    	
					    </div>
					    @endif
				    </div>
				  </div>
				</div>
				<!-- End of Button dan Card yang benar -->
			</div>
			<div class="dropdown-divider data-belum" id="dividerbelum-{{$d->id_pendaftaran}}"></div>
			@endforeach
			<div class="row justify-content-center" id="nodatabelum">
				<h5 class="text-center mt-3">Data tidak ditemukan.</h5>
			</div>
			<div class="row justify-content-end">
				{{ $databelum->links() }}
			</div>
			<!-- End of Data Pendaftar -->
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="nav-sudah" role="tabpanel" aria-labelledby="nav-sudah-tab">
	  	<div class="container-fluid">
	  		<!-- Search dan Tombol Download -->
	  		<div class="row justify-content-between mb-4" class="atas-table-home">
	  			<div class="col-4">
	  				<form id="search-sudah">
	  					<input type="text" name="search-sudah" placeholder="Search" id="searchsudah">
	  				</form>
	  			</div>
		  	</div>
		  	<!-- End of Search dan Tombol Download -->
		  	<!-- Header -->
		  	<div class="row p-2 table-header" id="table-home-header">
		  		<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block">ID Pendaftaran</div>
		  		<div class="col-3 col-lg-3 col-md-3 col-sm-3">Nama</div>
		  		<div class="col-2 d-none d-xl-block">Asal Universitas</div>
		  		<div class="col-2 col-xl-2 col-lg-3 col-md-3 col-sm-3 d-none d-xl-block d-lg-block d-md-block d-sm-block">Total</div>
		  		<div class="col-2 col-lg-2 col-md-3 col-sm-3">Status</div>
		  	</div>
		  	<!-- End of Header -->
		  	<!-- Data Pendaftar -->
		  	@foreach($datasudah as $d)
			<div class="row mt-3 data-row-konfirmasi justify-content-between align-items-center data-sudah" id="datasudah-{{$d->id_pendaftaran}}">
				<div class="col-2 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="nopendaftaran searchable" id="nopendaftaran-{{$d->id_pendaftaran}}">{{$d->id_pendaftaran}}</span></div>
				<div class="col-3"><span class="nama searchable" id="nama-{{$d->id_pendaftaran}}">{{$d->nama_pendaftar}}</span></div>
				<div class="col-2 d-none d-xl-block"><span class="univ searchable" id="univ-{{$d->id_pendaftaran}}">{{$d->asal_univ_pendaftar}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 col-sm-3 d-none d-xl-block d-lg-block d-md-block d-sm-block"><span class="total">Rp {{number_format($d->total_pembayaran,0,',','.')}}</span></div>
				<div class="col-2 col-lg-2 col-md-3 col-sm-3">
					<div class="row mb-2 ">
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
						statuspembayaran" id="status_pembayaran{{$d->id_pembayaran}}">
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
				</div>
				<!-- Button dan Card yang benar -->
				<div class="col col-md-1 col-lg-1 col-xl-1 col-sm-1 text-right"><span class="drop" id="drop{{$d->id_pendaftaran}}" data-toggle="collapse" data-target="#data-sudah{{$d->id_pendaftaran}}" aria-expanded="false" aria-controls="data-sudah{{$d->id_pendaftaran}}"></span></div>
				<div class="collapse mt-3" id="data-sudah{{$d->id_pendaftaran}}" style="width: 100%;">
				  <div class="card card-body card-drop">
				  	<div class="row">
					    <div class="col-xl-4">
					    	<div class="row drop-nopendaftar" id="drop-nopendaftar3">{{$d->id_pendaftaran}}</div>
					    	<div class="row dropdata drop-nama" id="drop-nama3"><span class="icon icon-nama"></span>{{$d->nama_pendaftar}}</div>
					    	<div class="row dropdata drop-email" id="drop-email3"><span class="icon icon-email"></span>{{$d->email_pendaftar}}</div>
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
					    	<div class="row dropdata drop-kota" id="drop-kota3"><span class="icon icon-kota"></span>@if($d->asal_daerah == null)
								-
								@else
								{{ $d->asal_daerah }}
								@endif</div>
					    	<div class="row dropdata drop-univ" id="drop-univ3"><span class="icon icon-univ"></span>{{$d->asal_univ_pendaftar}}</div>
					    	<div class="row dropdata">
					    		Telah melakukan pembayaran menggunakan rekening
					    	</div>
					    	<div class="row dropdata">
					    		<span><b>{{$d->bank_asal}}<br>
					    			Atas Nama : {{$d->atas_nama_rekening}}<br>
					    			No. Rek : {{$d->nomor_rekening}}
					    		</b>
					    		</span>
					    		<br>
					    	</div>
					    	<div class="row dropdata">
					    		<span>Pada <b>{{$d->tanggal_pembayaran}}</b></span>
					    	</div>
					    </div>
					    <div class="col-xl-4">
					    	<img class="xzoom img-fluid" src="{{url('storage/'.$d->bukti_pembayaran)}}" xoriginal="{{url('storage/'.$d->bukti_pembayaran)}}" style="max-height: 475px;width: auto;"/>
					    </div>
				    </div>
				  </div>
				</div>
				<!-- End of Button dan Card yang benar -->
			</div>
			<div class="dropdown-divider data-sudah" id="dividersudah-{{$d->id_pendaftaran}}"></div>
			@endforeach
			<div class="row justify-content-center" id="nodatasudah">
				<h5 class="text-center mt-3">Data tidak ditemukan.</h5>
			</div>
			<div class="row justify-content-end">
				{{ $databelum->links() }}
			</div>
			<!-- End of Data Pendaftar -->
	  	</div>
	  </div>
	</div>
</div>

@endsection
@section('script-admin')
<script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		 $('.xzoom').each(function() {

            //Initialization of xZoom here
            var instance = $(this).xzoom(); //<-- Don't forget to add your options here

            $('.xzoom-gallery', $(this).parent()).each(function () {
                instance.xappend($(this));
            });

            var mobj = $(this);
            var mw = mobj.width(), mh = mobj.height();

            $(window).mousemove(function(event){
                var mx = event.pageX, my = event.pageY, moffset = mobj.offset(), mtop = moffset.top, mleft = moffset.left;
                //if (mx < mleft || mx > mleft + mw || my < mtop || my > mtop + mh) instance.closezoom();
            });
        });
		 
		$(".menu-ul").each(function(){
			$(this).removeClass("active");
		});
		$(".verif-menu").addClass("active");

		$("#nodatasemua").hide();
		$("#nodatabelum").hide();
		$("#nodatasudah").hide();

		if($(".data-semua").length < 1){
			$("#nodatasemua").show();
		}

		if($(".data-belum").length < 1){
			$("#nodatabelum").show();
		}

		if($(".data-sudah").length < 1){
			$("#nodatasudah").show();
		}

		$("#searchall").on('input',function(){
			let found = false;
			if($(this).val().length > 2){
				$(".data-semua").hide();
				let searchterm = $(this).val().toLowerCase();
				$(".data-semua .searchable").each(function(index){
					if($(this).html().toLowerCase().includes(searchterm)){
						let id = $(this).attr('id').slice(-5);
						$("#datasemua-"+id).show();
						$("#datasemua-"+id+".data-semua").show();
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
				if($(".data-semua").length < 1){
					$("#nodatasemua").show();
				}
			}
		});

		$("#searchbelum").on('input',function(){
			let found = false;
			if($(this).val().length > 2){
				$(".data-belum").hide();
				let searchterm = $(this).val().toLowerCase();
				$(".data-belum .searchable").each(function(index){
					if($(this).html().toLowerCase().includes(searchterm)){
						let id = $(this).attr('id').slice(-5);
						$("#databelum-"+id).show();
						$("#databelum-"+id+" .data-belum").show();
						$("#dividerbelum-"+id).show();
						found = true;
						$("#nodatabelum").hide();
					}
				});
				if(!found){
					$("#nodatabelum").show();
				}
			}
			else{
				$(".data-belum").show();
				$("#nodatabelum").hide();

				if($(".data-belum").length < 1){
					$("#nodatabelum").show();
				}
			}
		});

		$("#searchsudah").on('input',function(){
			let found = false;
			if($(this).val().length > 2){
				$(".data-sudah").hide();
				let searchterm = $(this).val().toLowerCase();
				$(".data-sudah .searchable").each(function(index){
					if($(this).html().toLowerCase().includes(searchterm)){
						let id = $(this).attr('id').slice(-5);
						$("#datasudah-"+id).show();
						$("#datasudah-"+id+" .data-sudah").show();
						$("#dividersudah-"+id).show();
						found = true;
						$("#nodatasudah").hide();
					}
				});
				if(!found){
					$("#nodatasudah").show();
				}
			}
			else{
				$(".data-sudah").show();
				$("#nodatasudah").hide();
				if($(".data-sudah").length < 1){
					$("#nodatasudah").show();
				}
			}
		});

		$(".btn-ya").click(function(){
			let id = $(this).attr('id').slice(-5);
			Swal.fire({
			  title: 'Apakah anda yakin menerima pembayaran ini?',
			  text: "Aksi ini tidak dapat dikembalikan!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya',
			}).then(function (e) {

            if (e.value === true) {

                $.ajax({
                    type: 'GET',
                    url: "{{url('/admin/verifikasi/true/')}}"+id,
                    success: function (results) {
                        if (results.success === true) {
                        	Swal.fire(
							  'Berhasil!',
							  'Status pembayaran berhasil diubah',
							  'success'
							);
							$("#status_pembayaran"+id).removeClass('badge-danger');
							$("#status_pembayaran"+id).addClass('badge-success');
							$("#status_pembayaran"+id).html('Diterima');
							statusberubah(id);
                        } else {
                            Swal.fire(
							  'Gagal!',
							  'Status pembayaran tidak diubah',
							  'danger'
							)
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        });
		});

		$(".btn-tidak").click(function(){
			let id = $(this).attr('id').slice(-5);
			Swal.fire({
			  title: 'Apakah anda yakin menolak pembayaran ini?',
			  text: "Aksi ini tidak dapat dikembalikan!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya',
			}).then(function (e) {

            if (e.value === true) {

                $.ajax({
                    type: 'GET',
                    url: "{{url('/admin/verifikasi/false/')}}"+id,
                    success: function (results) {
                        if (results.success === true) {
                        	Swal.fire(
							  'Berhasil!',
							  'Status pembayaran berhasil diubah',
							  'success'
							);
							$("#status_pembayaran"+id).removeClass('badge-success');
							$("#status_pembayaran"+id).addClass('badge-danger');
							$("#status_pembayaran"+id).html('Ditolak');
							statusberubah(id);
                        } else {
                            Swal.fire(
							  'Gagal!',
							  'Status pembayaran tidak diubah',
							  'danger'
							)
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        });
		});

		$(".btn-ya-belum").click(function(){
			let id = $(this).attr('id').slice(-5);
			Swal.fire({
			  title: 'Apakah anda yakin menerima pembayaran ini?',
			  text: "Aksi ini tidak dapat dikembalikan!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya',
			}).then(function (e) {

            if (e.value === true) {

                $.ajax({
                    type: 'GET',
                    url: "{{url('/admin/verifikasi/true/')}}"+id,
                    success: function (results) {
                        if (results.success === true) {
                        	Swal.fire(
							  'Berhasil!',
							  'Status pembayaran berhasil diubah',
							  'success'
							);
							$("#status_pembayaranbelum"+id).removeClass('badge-danger');
							$("#status_pembayaranbelum"+id).addClass('badge-success');
							$("#status_pembayaranbelum"+id).html('Diterima');
							statusberubah(id);
                        } else {
                            Swal.fire(
							  'Gagal!',
							  'Status pembayaran tidak diubah',
							  'danger'
							)
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        });
		});

		$(".btn-tidak-belum").click(function(){
			let id = $(this).attr('id').slice(-5);
			Swal.fire({
			  title: 'Apakah anda yakin menolak pembayaran ini?',
			  text: "Aksi ini tidak dapat dikembalikan!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya',
			}).then(function (e) {

            if (e.value === true) {

                $.ajax({
                    type: 'GET',
                    url: "{{url('/admin/verifikasi/false/')}}"+id,
                    success: function (results) {
                        if (results.success === true) {
                        	Swal.fire(
							  'Berhasil!',
							  'Status pembayaran berhasil diubah',
							  'success'
							);
							$("#status_pembayaranbelum"+id).removeClass('badge-success');
							$("#status_pembayaranbelum"+id).addClass('badge-danger');
							$("#status_pembayaranbelum"+id).html('Ditolak');
							statusberubah(id);
                        } else {
                            Swal.fire(
							  'Gagal!',
							  'Status pembayaran tidak diubah',
							  'danger'
							)
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        });
		});

		function statusberubah(id){
			$("#data-belum"+id).remove();
			$("#pertanyaan-"+id).hide();
			$("#pertanyaan-belum-"+id).hide();
		}
	});
</script>
@endsection