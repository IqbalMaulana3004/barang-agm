@extends('layouts.main')

@section('content')

	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">

			{{-- Notofikasi --}}
			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif

			@if(session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
			@endif
			{{-- End Notifikasi --}}

			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>List Data Pegawai</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<p>Home</p>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									List Data Pegawai
								</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
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
						</div>
					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<a href="/pegawai/create" class="btn btn-outline-primary btn-sm">Tambah Pegawai</a>
					{{-- <h4 class="text-blue h4">Data Pegawai</h4> --}}
					
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Nama Pegawai</th>
								<th>Jabatan</th>
								<th>Departemen</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>No Telphone</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $dp)
								<tr>
									<td class="table-plus">{{ $dp->nama_pegawai }}</td>
									<td>{{ $dp->jabatan }}</td>
									<td>{{ $dp->departemen }}</td>
									<td>{{ $dp->alamat }}</td>
									<td>{{ $dp->jenis_kelamin }}</td>
									<td>{{ $dp->no_telfn }}</td>
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
												{{-- <a class="dropdown-item" href="#"
													><i class="dw dw-eye"></i> View</a
												> --}}
												<a class="dropdown-item" href="{{ route('pegawai.edit', $dp->kode_pegawai) }}">
													<i class="dw dw-edit2"></i> Edit
												</a>
												
												
												{{-- Delete Button --}}
												<a class="dropdown-item" href="{{ route('pegawai.destroy', $dp->kode_pegawai) }}"
													class="btn btn-danger btn-sm"
													onclick="event.preventDefault(); confirmDelete('{{ $dp->kode_pegawai }}');">
													 <i class="dw dw-delete-3"></i> Delete
												 </a>
												 
												 <form id="delete-form-{{ $dp->kode_pegawai }}" action="{{ route('pegawai.destroy', $dp->kode_pegawai) }}" method="POST" style="display: none;">
													 @csrf
													 @method('DELETE')
												 </form>
												 
												 <script>
												 function confirmDelete(kodePegawai) {
													 if (confirm('Yakin ingin menghapus data ini?')) {
														 document.getElementById('delete-form-' + kodePegawai).submit();
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
			{{-- <!-- multiple select row Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Data Table with multiple select row</h4>
				</div>
				<div class="pb-20">
					<table class="data-table table hover multiple-select-row nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Name</th>
								<th>Age</th>
								<th>Office</th>
								<th>Address</th>
								<th>Start Date</th>
								<th>Salart</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="table-plus">Gloria F. Mead</td>
								<td>25</td>
								<td>Sagittarius</td>
								<td>2829 Trainer Avenue Peoria, IL 61602</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>20</td>
								<td>Gemini</td>
								<td>2829 Trainer Avenue Peoria, IL 61602</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Sagittarius</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>25</td>
								<td>Gemini</td>
								<td>2829 Trainer Avenue Peoria, IL 61602</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>20</td>
								<td>Sagittarius</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>18</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Sagittarius</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Sagittarius</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- multiple select row Datatable End -->
			<!-- Checkbox select Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Data Table with Checckbox select</h4>
				</div>
				<div class="pb-20">
					<table class="checkbox-datatable table nowrap">
						<thead>
							<tr>
								<th>
									<div class="dt-checkbox">
										<input
											type="checkbox"
											name="select_all"
											value="1"
											id="example-select-all"
										/>
										<span class="dt-checkbox-label"></span>
									</div>
								</th>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Start date</th>
								<th>Salary</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Tokyo</td>
								<td>2008/11/28</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td></td>
								<td>Angelica Ramos</td>
								<td>Chief Executive Officer (CEO)</td>
								<td>London</td>
								<td>2009/10/09</td>
								<td>$1,200,000</td>
							</tr>
							<tr>
								<td></td>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td></td>
								<td>Bradley Greer</td>
								<td>Software Engineer</td>
								<td>London</td>
								<td>2012/10/13</td>
								<td>$132,000</td>
							</tr>
							<tr>
								<td></td>
								<td>Brenden Wagner</td>
								<td>Software Engineer</td>
								<td>San Francisco</td>
								<td>2011/06/07</td>
								<td>$206,850</td>
							</tr>
							<tr>
								<td></td>
								<td>Caesar Vance</td>
								<td>Pre-Sales Support</td>
								<td>New York</td>
								<td>2011/12/12</td>
								<td>$106,450</td>
							</tr>
							<tr>
								<td></td>
								<td>Cedric Kelly</td>
								<td>Senior Javascript Developer</td>
								<td>Edinburgh</td>
								<td>2012/03/29</td>
								<td>$433,060</td>
							</tr>
							<tr>
								<td></td>
								<td>Dai Rios</td>
								<td>Personnel Lead</td>
								<td>Edinburgh</td>
								<td>2012/09/26</td>
								<td>$217,500</td>
							</tr>
							<tr>
								<td></td>
								<td>Doris Wilder</td>
								<td>Sales Assistant</td>
								<td>Sidney</td>
								<td>2010/09/20</td>
								<td>$85,600</td>
							</tr>
							<tr>
								<td></td>
								<td>Fiona Green</td>
								<td>Chief Operating Officer (COO)</td>
								<td>San Francisco</td>
								<td>2010/03/11</td>
								<td>$850,000</td>
							</tr>
							<tr>
								<td></td>
								<td>Gavin Cortez</td>
								<td>Team Leader</td>
								<td>San Francisco</td>
								<td>2008/10/26</td>
								<td>$235,500</td>
							</tr>
							<tr>
								<td></td>
								<td>Herrod Chandler</td>
								<td>Sales Assistant</td>
								<td>San Francisco</td>
								<td>2012/08/06</td>
								<td>$137,500</td>
							</tr>
							<tr>
								<td></td>
								<td>Hope Fuentes</td>
								<td>Secretary</td>
								<td>San Francisco</td>
								<td>2010/02/12</td>
								<td>$109,850</td>
							</tr>
							<tr>
								<td></td>
								<td>Jena Gaines</td>
								<td>Office Manager</td>
								<td>London</td>
								<td>2008/12/19</td>
								<td>$90,560</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Checkbox select Datatable End -->
			<!-- Export Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Data Table with Export Buttons</h4>
				</div>
				<div class="pb-20">
					<table
						class="table hover multiple-select-row data-table-export nowrap"
					>
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Name</th>
								<th>Age</th>
								<th>Office</th>
								<th>Address</th>
								<th>Start Date</th>
								<th>Salart</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="table-plus">Gloria F. Mead</td>
								<td>25</td>
								<td>Sagittarius</td>
								<td>2829 Trainer Avenue Peoria, IL 61602</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>20</td>
								<td>Gemini</td>
								<td>2829 Trainer Avenue Peoria, IL 61602</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Sagittarius</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>25</td>
								<td>Gemini</td>
								<td>2829 Trainer Avenue Peoria, IL 61602</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>20</td>
								<td>Sagittarius</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>18</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Sagittarius</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Sagittarius</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
							<tr>
								<td class="table-plus">Andrea J. Cagle</td>
								<td>30</td>
								<td>Gemini</td>
								<td>1280 Prospect Valley Road Long Beach, CA 90802</td>
								<td>29-03-2018</td>
								<td>$162,700</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Export Datatable End --> --}}
		</div>
		<div class="footer-wrap pd-20 mb-20 card-box">
			DeskApp - Bootstrap 4 Admin Template By
			<a href="https://github.com/dropways" target="_blank"
				>Ankit Hingarajiya</a
			>
		</div>
	</div>

@endsection