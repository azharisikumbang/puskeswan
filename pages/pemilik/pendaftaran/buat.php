<?php 
$site = [
	'operasional' => [
		'Senin' 	=> ['07.30', '16.00'],
		'Selasa' 	=> ['07.30', '16.00'],
		'Rabu' 		=> ['07.30', '16.00'],
		'Kamis' 	=> ['07.30', '16.00'],
		'Jumat' 	=> ['07.30', '16.00'],
		'Sabtu' 	=> ['-', '-'],
		'Minggu' 	=> ['-', '-']
	],
];
?>
<div class="container px-2">
	<h5 class="mb-4 fw-light fs-5">Buat Pendaftaran</h5>
	<div class="row">
		<div class="col-sm-6">
				<form action="./module.php?module=pendaftaran&action=tambah" method="post">
					<div class="col-12 mb-3">
				      <label for="nama" class="form-label">Tanggal Pengobatan</label>
				      <input type="datetime-local" name="tanggal" class="form-control" required="">
				    </div>
					<div class="col-12 mb-3">
				      <label for="nama" class="form-label">Jenis Hewan </label>
				      <input type="text" name="jenis_hewan" class="form-control" required="">
				    </div>
					<div class="col-12 mb-3">
				      <label for="nama" class="form-label">Usia Hewan</label>
				      <input type="text" name="usia_hewan" class="form-control" required="">
				    </div>
					<div class="col-12 mb-3">
				      	<div>
				      		<label for="tujuan" class="form-label">Tujuan</label>
				      	</div>
				      	<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="tujuan" value="vaksinasi">
							<label class="form-check-label">Vaksinasi</label>
						</div>
				      	<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="tujuan" value="rekam_medis">
							<label class="form-check-label">Rekam Medis</label>
						</div>
				    </div>
					<div class="mb-3">
						<button type="submit" class="btn btn-success">Daftarkan</button>
					</div>
				</form>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="card-title d-flex justify-content-between">
						<h5>Jadwal Operasional</h5>
					</div>
					<div class="card-text">
					      <ul class="list-group list-group-flush">
					      	<?php foreach ($site['operasional'] as $hari => $operasional) {  
					      		if ($operasional[0] == '-') continue ?>
								<li class="list-group-item">
								  <div class="row">
								    <div class="col-sm-4"><?= $hari ?></div>
								    <div class="col-sm-8">: <?= $operasional[0] . ' - ' . $operasional[1] ?> WIB</div>
								  </div>
								</li>
								<?php } ?>
					      </ul>
					</div>
				</div>
		</div>
	</div>
</div>
