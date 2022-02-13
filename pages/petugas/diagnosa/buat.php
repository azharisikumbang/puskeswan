<?php $jadwal = require_once './modules/jadwal/single.php'; ?>
<div class="container px-2">
	<h5 class="mb-4 fw-light fs-5">Buat Diagnosa</h5>
	<div class="row">
		<div class="col-6">
			<form action="./module.php?module=diagnosa&action=simpan" method="post">
				<div class="col-12 mb-3">
			      <label for="nama" class="form-label">Tanggal Pembuatan</label>
			      <input type="hidden" name="id_jadwal" class="form-control" required="" value="<?= $jadwal['id'] ?>">
			      <input type="datetime-local" name="tanggal" class="form-control" required="">
			    </div>
				<div class="col-12 mb-3">
			      <label for="nama" class="form-label">Gejala Penyakit </label>
			      <textarea type="text" name="gejala" class="form-control"></textarea>
			    </div>
				<div class="col-12 mb-3">
			      <label for="nama" class="form-label">Diagnosa Penyakit</label>
			      <textarea type="text" name="penyakit" class="form-control"></textarea>
			    </div>
				<div class="col-12 mb-3">
			      <label for="nama" class="form-label">Terapi</label>
			      <textarea name="terapi" class="form-control"></textarea>
			    </div>
				<div class="mb-3">
					<button type="submit" class="btn btn-warning">Simpan</button>
				</div>
			</form>
		</div>
		<div class="col-6">
		    <div class="card mb-4">
		      <div class="card-body">
		        <div class="card-title d-flex justify-content-between">
		          	<h5>Detail Jadwal</h5>
		        </div>
				<div class="card-text">
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">
				      <div class="row">
				        <div class="col-sm-4">Tanggal Pemeriksaaan</div>
				        <div class="col-sm-8">: <?= date("d/m/Y H:i:s", strtotime($jadwal['tanggal'])) ?> WIB</div>
				      </div>
				    </li>
				    <li class="list-group-item">
				      <div class="row">
				        <div class="col-sm-4">Jenis Hewan</div>
				        <div class="col-sm-8">: <?= $jadwal['jenis_hewan'] ?></div>
				      </div>
				    </li>
				    <li class="list-group-item">
				      <div class="row">
				        <div class="col-sm-4">Usia Hewan</div>
				        <div class="col-sm-8">: <?= $jadwal['usia_hewan'] ?></div>
				      </div>
				    </li>
				    <li class="list-group-item">
				      <div class="row">
				        <div class="col-sm-4">Tujuan Pendaftaran</div>
				        <div class="col-sm-8">: <?= strtoupper(str_replace('_', ' ', $jadwal['tujuan'])) ?></div>
				      </div>
				    </li>
				  </ul>
				</div>
			  </div>
			</div>

		    <div class="card">
		      <div class="card-body">
		        <div class="card-title d-flex justify-content-between">
		            <h5>Detail Pemilik</h5>
		          </div>
		        <div class="card-text">
		          <ul class="list-group list-group-flush">
		            <li class="list-group-item">
		              <div class="row">
		                <div class="col-sm-4">Nama Pemilik</div>
		                <div class="col-sm-8">: <?= $jadwal['nama'] ?></div>
		              </div>
		            </li>
		            <li class="list-group-item">
		              <div class="row">
		                <div class="col-sm-4">No. Handphone</div>
		                <div class="col-sm-8">: <?= $jadwal['kontak'] ?></div>
		              </div>
		            </li>
		            <li class="list-group-item">
		              <div class="row">
		                <div class="col-sm-4">Alamat</div>
		                <div class="col-sm-8">: <?= $jadwal['alamat'] ?></div>
		              </div>
		            </li>
		            <li class="list-group-item">
		              <div class="row">
		                <div class="col-sm-4">Jenis Kelamin</div>
		                <div class="col-sm-8">: <?= ($jadwal['jenis_kelamin_pemilik'] == '1') ? 'Laki - laki' : 'Perempuan'; ?></div>
		              </div>
		            </li>
		          </ul>
		        </div>
		      </div>
		    </div>
		</div>
	</div>
</div>