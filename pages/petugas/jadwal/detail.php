<?php 

if (!isset($_GET['nomor'])) {
	require_once './pages/not-found.php';
	exit();
} 

$jadwal = require_once './modules/jadwal/jadwal-detail.php';

if (count($jadwal) < 1) { 
  require_once './pages/not-found.php';
  exit();
} ?>
<div class="d-flex justify-content-between">
  <h3>Jadwal #<?= $_GET['nomor'] ?></h3>
  <div>
    <?php if (is_null($jadwal['tanggal_rekam_medis']) && is_null($jadwal['tanggal_vaksinasi'])): ?>
    <a href="./petugas.php?page=diagnosa/buat&nomor=<?= $_GET['nomor'] ?>" class="btn btn-primary btn-sm">Buat Diagnosa</a>
    <?php else: ?>
    <span class="font-weight-bold text-danger">[ <?= strtoupper($jadwal['status']) ?> ]</span>
    <?php endif ?>
  </div>
</div>
<div class="row mt-4">
  <div class="col-sm-6 mb-4">
    <div class="card">
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
  </div>

  <div class="col-sm-6 mb-4">
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

  <div class="col-sm-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="card-title d-flex justify-content-between">
            <h5>Detail Diagnosa</h5>
          </div>
        <div class="card-text">
        <?php if (is_null($jadwal['tanggal_rekam_medis']) && is_null($jadwal['tanggal_vaksinasi'])) { ?>
          <i>Tidak ada hasil diagnosa.</i>
        <?php } else {
          if (in_array(strtolower($jadwal['tujuan']), ['vaksinasi', 'rekam_medis'])) {
              $prefix = strtolower($jadwal['tujuan']); ?>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2">Tanggal</div>
                  <div class="col-sm-10">: <?= date("d/m/Y H:i:s", strtotime($jadwal[sprintf("tanggal_%s", $prefix)])); ?> WIB</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2">Gejala</div>
                  <div class="col-sm-10">: <?= $jadwal[sprintf("gejala_%s", $prefix)]; ?></div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2">Diagnosa Penyakit</div>
                  <div class="col-sm-10">: <?= $jadwal[sprintf("penyakit_%s", $prefix)]; ?></div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2">Terapi</div>
                  <div class="col-sm-10">: <?= $jadwal[sprintf("terapi_%s", $prefix)]; ?></div>
                </div>
              </li>
            </ul>
        <?php } } ?>
        </div>
      </div>
    </div>
  </div>
</div>