<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Sekolah</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<div class="row">

	<!-- Area Chart -->
	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
				<div class="dropdown no-arrow">

				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body">
				<div class="card-body">
					<form class="user" name='frm-kirim' method='POST'>
						<div class="form-group">Nama
							<input type="text" class="form-control form-control-user" name="nama">
						</div>

						<div class="form-group">Alamat
							<textarea class="form-control form-control-user" name="alamat"></textarea>
						</div>

						<div class="form-group">Agama
							<select name="agama" class="form-control form-control-user">
								<option value="1">Islam</option>
								<option value="2">kristen</option>
								<option value="3">hindu</option>
								<option value="4">buda</option>
							</select>
						</div>

						<div class="form-group">Tanggal Lahir
							<input type="date" class="form-control form-control-user" name="tgl_lahir">
						</div>

						<div class="form-group">No. HandPhone
							<input type="number" class="form-control form-control-user" name="hp">
						</div>

						<input type="submit" class="btn btn-primary btn-user btn-block" name="kirim" value="Simpan Data" />

					</form>
				</div>
			</div>
		</div>
	</div>

</div>