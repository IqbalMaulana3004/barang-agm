@extends('layouts.main')

@section('content')

		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Barang Masuk</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html">Home</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										Data Barang Masuk
									</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							{{-- <div class="dropdown"> --}}
								<a
									class="btn btn-primary"
									href="{{ route('barang-masuk.create') }}"
									{{-- role="button" --}}
									{{-- data-toggle="dropdown" --}}
								>
									Tambah Data
								</a>
								
							{{-- </div> --}}
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Barang</h4>
						
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">No</th>
									<th>Nama Barang</th>
									<th>Jenis Barang</th>
									<th>Merek</th>
									<th>Jumlah</th>
									<th>Tanggal Masuk</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp
								@foreach ($data as $item)
									<tr>
										<td class="table-plus">{{ $no++ }}</td>
										<td>{{ $item->nama_barang }}</td>
										<td>{{ $item->jenis_barang }}</td>
										<td>{{ $item->merek }}</td>
										<td>{{ $item->jumlah_kelola }}</td>
										<td>{{ $item->tanggal_masuk }}</td>
									
										<td>
											<div class="dropdown">
												<a
													class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
													href="#"
													role="button"
													data-toggle="dropdown"
												>
													<i class="dw dw-more"></i>
												</a>
												<div
													class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
												>
													<a class="dropdown-item" href="#"
														><i class="dw dw-eye"></i> View</a
													>
													<a class="dropdown-item" href="{{ route('barang-masuk.edit', $item->kode_barang) }}"
														><i class="dw dw-edit2"></i> Edit</a
													>
													{{-- Delete Button --}}
													<a class="dropdown-item" href="{{ route('barang-masuk.destroy', $item->kode_barang) }}"
														class="btn btn-danger btn-sm"
														onclick="event.preventDefault(); confirmDelete('{{ $item->kode_barang }}');">
														<i class="dw dw-delete-3"></i> Delete
													</a>
													
													<form id="delete-form-{{ $item->kode_barang }}" action="{{ route('barang-masuk.destroy', $item->kode_barang) }}" method="POST" style="display: none;">
														@csrf
														@method('DELETE')
													</form>
													
													<script>
													function confirmDelete(kodeBarang) {
														if (confirm('Yakin ingin menghapus data ini? \n Jika anda menghapus Data barang masuk maka semua data barang akan menghilang')) {
															document.getElementById('delete-form-' + kodeBarang).submit();
														}
													}
													</script>
													{{-- End Delete Button --}}
												</div>
											</div>
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
