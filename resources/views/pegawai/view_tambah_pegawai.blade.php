@extends('layouts.main')

@section('content')

		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<!-- <h4 class="text-blue h4">Data Pegawai</h4> -->
						<a href="/pegawai/create" class="btn btn-sm btn-outline-primary">Tambah Pegawai</a>
						
					</div>
					<div class="pb-20">
					
						<form>
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group has-success">
										<label class="form-control-label">Input with success</label>
										<input type="text" class="form-control form-control-success">
										<div class="form-control-feedback">Success! You've done it.</div>
										<small class="form-text text-muted">Example help text that remains unchanged.</small>
									</div>
									<div class="form-group has-warning">
										<label class="form-control-label">Input with warning</label>
										<input type="text" class="form-control form-control-warning">
										<div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
										<small class="form-text text-muted">Example help text that remains unchanged.</small>
									</div>
									<div class="form-group has-danger">
										<label class="form-control-label">Input with danger</label>
										<input type="text" class="form-control form-control-danger">
										<div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
										<small class="form-text text-muted">Example help text that remains unchanged.</small>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group has-success row">
										<label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with success</label>
										<div class="col-sm-12 col-md-10">
											<input type="text" class="form-control form-control-success">
											<div class="form-control-feedback">Success! You've done it.</div>
											<small class="form-text text-muted">Example help text that remains unchanged.</small>
										</div>
									</div>
									<div class="form-group has-warning row">
										<label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with warning</label>
										<div class="col-sm-12 col-md-10">
											<input type="text" class="form-control form-control-warning">
											<div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
											<small class="form-text text-muted">Example help text that remains unchanged.</small>
										</div>
									</div>
									<div class="form-group has-danger row">
										<label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with danger</label>
										<div class="col-sm-12 col-md-10">
											<input type="text" class="form-control form-control-danger">
											<div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
											<small class="form-text text-muted">Example help text that remains unchanged.</small>
										</div>
									</div>
								</div>
							</div>
						</form>
							
					</div>
				</div>
				<!-- Simple Datatable End -->
				
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				AGM Inventory - 1.0
			</div>
		</div>

@endsection
