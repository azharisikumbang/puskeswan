<?php $list_jadwal = require './modules/jadwal/list-jadwal-harian-pemilik.php';?>
<div class="mb-3 d-flex justify-content-between">
	<h3>Jadwal</h3>
	<p class="text-muted">Sekarang : <?= date('d-m-Y H:i') ?> WIB</p>
</div>
<?php if (count($list_jadwal) > 0) { 
	foreach ($list_jadwal as $tanggal => $jadwal_harian) { ?>
	<h5>Tanggal : <?= date('d-m-Y', strtotime($tanggal)) ?></h5>
	<table class="table table-stripped mb-5">
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
			foreach ($jadwal_harian as $jadwal) { 
				switch ($jadwal['status']) {
					case 'SELESAI':
						$badge = 'success';
						break;
					default:
						$badge = 'warning';
						break;
				}
			?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= date('d/m/Y H:i:s', strtotime($jadwal['tanggal'])) ?></td>
				<td><?= $jadwal['nama'] ?></td>
				<td><?= $jadwal['jenis_hewan'] ?></td>
				<td><?= $jadwal['usia_hewan'] ?></td>
				<td><?= strtoupper(str_replace('_', ' ', $jadwal['tujuan'])) ?></td>
				<td><span class="badge bg-<?= $badge ?>"><?= $jadwal['status'] ?></span></td>
				<td>
					<?php if ($jadwal['status'] == 'PENDING'): ?>
					<a class="text-decoration-none" href="./petugas.php?page=diagnosa/buat&nomor=<?= $jadwal['id'] ?>">
						<small>Buat Diagnosa</small>
					</a> |
					<?php endif ?>
					<a class="text-decoration-none" href="./petugas.php?page=jadwal/detail&nomor=<?= $jadwal['id'] ?>">
						<small>Lihat Detail</small>
					</a>
				</td>
			</tr>
			<?php } ?> 
		</tbody>
	</table>
<?php  } } else { ?>
<div class="my-3">
	<i>Tidak ada jadwal apapun terdaftar.</i>
</div>
<?php } ?>