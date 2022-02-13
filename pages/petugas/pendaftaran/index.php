<?php $list_pendaftaran = require './modules/pendaftaran/list-pendaftaran.php'; ?>
<h3>Data Pendaftaran</h3>
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
					<?php if ($pendaftaran['status'] == 'DIBUAT'): ?>
					<a href="./petugas.php?page=pendaftaran/detail&nomor=<?= $pendaftaran['id'] ?>">Buat Jadwal</a> | 
					<?php endif ?>
					<a href="./petugas.php?page=pendaftaran/detail&nomor=<?= $pendaftaran['id'] ?>">selengkapnya..</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
<div class="my-3">
	<i>Daftar pendaftaran tidak ada.</i>
</div>
<?php } ?>