<?php 

$list_pendaftaran = require './modules/pendaftaran/list-pendaftaran-pemilik.php';

if (isset($_GET['new'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <h4 class="alert-heading">Selamat!</h4>
  <p>Akun dengan username <?= $_SESSION['username'] ?> telah kami buat, silahkan amankan akun anda dengan <a href="./pemilik.php?page=akun/pengaturan">mengatur ulang kata sandi</a></p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<div class="mb-3 d-flex justify-content-between">
	<h3>Pendaftaran Anda</h3>
	<a href="./pemilik.php?page=pendaftaran/buat" class="btn btn-primary" >Daftarkan Pengobatan</a>
</div>
<?php if (count($list_pendaftaran) > 0) { ?>
	<table class="table table-stripped">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Pemilik</th>
				<th>Jenis Hewan</th>
				<th>Usia Hewan</th>
				<th>Tujuan</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1; 
			foreach ($list_pendaftaran as $pendaftaran) { 
				switch ($pendaftaran['status']) {
					case 'DISETUJUI':
						$badge = 'success';
						break;
					case 'BATAL':
						$badge = 'danger';
						break;
					default:
						$badge = 'warning';
						break;
				}

				?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= date('d/m/Y H:i:s', strtotime($pendaftaran['tanggal'])) ?></td>
				<td><?= $pendaftaran['nama'] ?></td>
				<td><?= $pendaftaran['jenis_hewan'] ?></td>
				<td><?= $pendaftaran['usia_hewan'] ?></td>
				<td><?= strtoupper(str_replace('_', ' ', $pendaftaran['tujuan'])) ?></td>
				<td><span class="badge bg-<?= $badge ?>"><?= $pendaftaran['status'] ?></span></td>
				<td>
					<?php if ($pendaftaran['status'] == 'PENDING'): ?>
					<a class="text-decoration-none" href="./module.php?module=pendaftaran&action=batalkan&nomor=<?= $pendaftaran['id'] ?>">
						<small>Ajukan Pembatalan</small>
					</a>
					<?php endif ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
<div class="my-3">
	<i>Nampaknya kamu belum memilik pendaftaran apapun.</i>
</div>
<?php } ?>