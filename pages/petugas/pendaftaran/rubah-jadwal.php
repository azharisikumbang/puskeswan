<?php $pendaftaran = require_once './modules/pendaftaran/pendaftaran-detail.php'; ?>

<div class="container px-2">
	<div class="row">
		<h5 class="mb-4 fw-light fs-5">Rubah Jadwal Pendaftaran #<?= $pendaftaran['id'] ?></h5>
		<form action="./module.php?module=pendaftaran&action=rubah-jadwal" method="post" class="w-50">
		    <input type="hidden" name="id_daftar" required="" value="<?= $pendaftaran['id'] ?>">
			<div class="col-12 mb-3">
		      <label for="nama" class="form-label">Tanggal Pengobatan</label>
		      <input type="datetime-local" name="tanggal" class="form-control" required="" value="<?= date('Y-m-d\TH:i', strtotime($pendaftaran['tanggal'])) ?>">
		    </div>
			<div class="col-12 mb-3">
		      <label for="nama" class="form-label">Jenis Hewan </label>
		      <input type="text" name="jenis_hewan" class="form-control" required="" value="<?= $pendaftaran['jenis_hewan'] ?>">
		    </div>
			<div class="col-12 mb-3">
		      <label for="nama" class="form-label">Usia Hewan</label>
		      <input type="text" name="usia_hewan" class="form-control" required="" value="<?= $pendaftaran['usia_hewan'] ?>">
		    </div>
			<div class="col-12 mb-3">
		      	<div>
		      		<label for="tujuan" class="form-label">Tujuan</label>
		      	</div>
		      	<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="tujuan" value="vaksinasi" <?= (strtolower($pendaftaran['tujuan']) == 'vaksinasi') ? 'checked=checked' : '' ?>>
					<label class="form-check-label">Vaksinasi</label>
				</div>
		      	<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="tujuan" value="rekam_medis" <?= (strtolower($pendaftaran['tujuan']) == 'rekam_medis') ? 'checked=checked' : '' ?>>
					<label class="form-check-label">Rekam Medis</label>
				</div>
		    </div>
			<div class="mb-3">
				<button type="submit" class="btn btn-warning">Simpan</button>
			</div>
		</form>
	</div>
</div>
