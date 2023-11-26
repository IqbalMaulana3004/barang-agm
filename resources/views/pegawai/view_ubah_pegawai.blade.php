@extends('layouts.main')

@section('content')

	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Tambah	Data Pegawai</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<p>Data Pegawai</p>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									Tambah Pegawai
								</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<!-- <div class="dropdown">
							<a
								class="btn btn-primary dropdown-toggle"
								href="#"
								role="button"
								data-toggle="dropdown"
							>
								January 2018
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Export List</a>
								<a class="dropdown-item" href="#">Policies</a>
								<a class="dropdown-item" href="#">View Assets</a>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			
			<!-- Input Validation Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Masukkan Data Pegawai</h4>
						
					</div>
				</div>
				<form action="{{ route('pegawai.update', $pegawai->kode_pegawai) }}" method="POST">
					@csrf
                    @method('PUT')
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group ">
								<label class="form-control-label">Nama Pegawai</label>
								<input
									type="text"
									class="form-control " name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}"
								/>
								@error('nama_pegawai')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
							<div class="form-group ">
								<label class="form-control-label">Alamat</label>
								<input
									type="text"
									class="form-control " name="alamat" value="{{ $pegawai->alamat }}"
								/>
								@error('alamat')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
							<div class="form-group ">
								<label class="form-control-label">Jenis Kelamin</label>
								<input
									type="text"
									class="form-control " name="jenis_kelamin" value="{{ $pegawai->jenis_kelamin }}"
								/>
								@error('jenis_kelamin')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					
						<div class="col-md-6 col-sm-12">
							<div class="form-group ">
								<label class="form-control-label">Departemen</label>
								<input
									type="text"
									class="form-control " name="departemen" value="{{ $pegawai->departemen }}"
								/>
								@error('departemen')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
							<div class="form-group ">
								<label class="form-control-label">Jabatan</label>
								<input
									type="text"
									class="form-control" name="jabatan" value="{{ $pegawai->jabatan }}"
								/>
								@error('jabatan')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group ">
								<label class="form-control-label">No Telfon</label>
								<input
									type="text"
									class="form-control " name="no_telfn" value="{{ $pegawai->no_telfn }}"
								/>
								@error('no_telfn')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					
					</div>
					<div class="row">
						<div class="btn-list m-3">
							<a href="/pegawai" class="btn btn-secondary btn-lg" role="button">
								Kembali
							</a>
							<button type="submit" class="btn btn-lg btn-primary">
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
