<?php 

if (!isset($_GET['nomor'])) {
	require_once './pages/not-found.php';
	exit();
} 

$pendaftaran = require_once './modules/pendaftaran/pendaftaran-detail.php';

if (count($pendaftaran) < 1) { 
  require_once './pages/not-found.php';
  exit();
} ?>
<div class="d-flex justify-content-between">
  <h3>Pendaftaran #<?= $_GET['nomor'] ?></h3>
  <div>
    <?php if ($pendaftaran['status'] == 'PENDING'): ?>
    <a href="./petugas.php?page=pendaftaran/rubah-jadwal&nomor=<?= $_GET['nomor'] ?>" class="btn btn-warning btn-sm text-white">Rubah Jadwal</a>
    <a href="./module.php?module=pendaftaran&action=terima&nomor=<?= $_GET['nomor'] ?>" class="btn btn-primary btn-sm">Setujui Pendaftaran</a>
    <?php else: ?>
    <span class="font-weight-bold text-danger">[ <?= strtoupper($pendaftaran['status']) ?> ]</span>
    <?php endif ?>
  </div>
</div>
<div class="row mt-4">
  <div class="col-sm-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="card-title d-flex justify-content-between">
            <h5>Detail Pendaftaran</h5>
          </div>
        <div class="card-text">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-4">Tanggal</div>
                <div class="col-sm-8">: <?= date("d/m/Y H:i:s", strtotime($pendaftaran['tanggal'])) ?> WIB</div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-4">Jenis Hewan</div>
                <div class="col-sm-8">: <?= $pendaftaran['jenis_hewan'] ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-4">Usia Hewan</div>
                <div class="col-sm-8">: <?= $pendaftaran['usia_hewan'] ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-4">Tujuan Pendaftaran</div>
                <div class="col-sm-8">: <?= strtoupper(str_replace('_', ' ', $pendaftaran['tujuan'])) ?></div>
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
                <div class="col-sm-8">: <?= $pendaftaran['nama'] ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-4">No. Handphone</div>
                <div class="col-sm-8">: <?= $pendaftaran['kontak'] ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-4">Alamat</div>
                <div class="col-sm-8">: <?= $pendaftaran['alamat'] ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-4">Jenis Kelamin</div>
                <div class="col-sm-8">: <?= ($pendaftaran['jenis_kelamin_pemilik'] == '1') ? 'Laki - laki' : 'Perempuan'; ?></div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>