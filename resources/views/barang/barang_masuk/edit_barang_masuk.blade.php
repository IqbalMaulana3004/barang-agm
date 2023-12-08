@extends('layouts.main')

@section('content')

	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Edit Data Barang</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<p>Data Barang Masuk</p>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									Edit Barang
								</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						
					</div>
				</div>
			</div>
			
			<!-- Input Validation Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Masukkan Data Barang</h4>
						
					</div>
				</div>
				<form action="{{ route('barang-masuk.update', $barang->kode_barang) }}" method="POST">
					@csrf
                    @method('PUT')
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group ">
								<label class="form-control-label">Nama Barang</label>
								<input
									type="text"
									class="form-control " name="nama_barang" placeholder="Example : Laptop" value="{{ $barang->nama_barang }}"
								/>
								@error('nama_barang')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
							<div class="form-group ">
								<label class="form-control-label">Jenis Barang</label>
								<input
									type="text"
									class="form-control " name="jenis_barang" placeholder="Example : Elektronik" value="{{ $barang->jenis_barang }}"
								/>
								@error('jenis_barang')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
							<div class="form-group ">
								<label class="form-control-label">Tanggal Masuk</label>
								<input
									type="date"
									class="form-control " name="tanggal_masuk" placeholder="Example : 30-12-2023" value="{{ $barang->tanggal_masuk }}"
								/>
								@error('tanggal_masuk')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
						
						</div>
					
						<div class="col-md-6 col-sm-12">
							<div class="form-group ">
								<label class="form-control-label">Merek</label>
								<input
									type="text"
									class="form-control " name="merek" placeholder="Example : Asus 4B11" value="{{ $barang->merek }}"
								/>
								@error('merek')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
							<div class="form-group ">
								<label class="form-control-label">Jumlah Barang</label>
								<input
									type="number"
									class="form-control" name="jumlah_barang" placeholder="Example : 12" value="{{ $barang->jumlah_kelola }}"
								/>
								@error('jumlah_barang')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group ">
								<label class="form-control-label">Keterangan</label>
								<input
									type="text"
									class="form-control " name="keterangan" placeholder="Example : Barang Baru Di Beli" value="{{ $barang->keterangan }}"
								/>
								@error('keterangan')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
						</div>
					
					</div>
					<div class="row">
						<div class="btn-list m-3">
							<a href="/barang-masuk" class="btn btn-secondary btn-sm" role="button">
								Kembali
							</a>
							<button type="submit" class="btn btn-sm btn-primary">
								Simpan Data
							</button>
							
						</div>
					</div>
				</form>
			</div>
			<!-- Input Validation End -->
			
		</div>
		<div class="footer-wrap pd-20 mb-20 card-box">
			AGM Inventory - 1.0
		</div>
	</div>


@endsection
