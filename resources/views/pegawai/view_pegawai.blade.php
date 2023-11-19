@extends('layouts.main')

@section('content')

		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Data Pegawai</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="#">Home</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										Data Pegawai
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
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<!-- <h4 class="text-blue h4">Data Pegawai</h4> -->
						<a href="/pegawai/" class="btn btn-sm btn-outline-primary">Tambah Pegawai</a>
						
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">No</th>
									<th>Nama</th>
									<th>Jabatan</th>
									<th>Departemen</th>
									<th>Tanggal Bergabung</th>
									<th>Alamat</th>
									<th>No Telp</th>
									<th>Action </th>
								</tr>
							</thead>
							<tbody>
								@php $no=0 @endphp
								@foreach($data as $dt)
								@php $no++ @endphp
								<tr>
									<td>{{ $no }}</td>
									<td class="table-plus">{{ $dt['nama_pegawai'] }}</td>
									<td>{{ $dt['jabatan'] }}</td>
									<td>{{ $dt['departemen'] }}</td>
									<td>{{ $dt['tanggal_gabung'] }}</td>
									<td>{{ $dt['alamat'] }}</td>
									<td>{{ $dt['no_telfn'] }}</td>
									<td>
									<div class="table-actions">
										<a href="#" data-color="#171108"
											><i class="icon-copy dw dw-eye"></i
										></a>
										<a href="#" data-color="#265ed7"
											><i class="icon-copy dw dw-edit2"></i
										></a>
										<a href="#" data-color="#e95959"
											><i class="icon-copy dw dw-delete-3"></i
										></a>
									</div>
										<!-- <div class="dropdown">
											<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
												Action Menu
											</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="#"
													><i class="dw dw-eye"></i> View</a>
												</li>
												<li><a class="dropdown-item" href="#"
													><i class="dw dw-edit2"></i> Edit</a>
												</li>
												<li><a class="dropdown-item" href="#"
													><i class="dw dw-delete-3"></i> Delete</a>
												</li>
											</ul>
										</div> -->

										<!-- <div class="dropdown">
											
											<div
												class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
											>
												<a class="dropdown-item" href="#"
													><i class="dw dw-eye"></i> View</a
												>
												<a class="dropdown-item" href="#"
													><i class="dw dw-edit2"></i> Edit</a
												>
												<a class="dropdown-item" href="#"
													><i class="dw dw-delete-3"></i> Delete</a
												>
											</div>
										</div> -->
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				AGM Inventory - 1.0
			</div>
		</div>

@endsection
