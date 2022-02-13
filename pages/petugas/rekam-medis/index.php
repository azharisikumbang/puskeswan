<?php $list_rekam_medis = require './modules/rekam-medis/list-rekam-medis.php'; ?>
<h3>Riwayat Rekam Medis</h3>
<?php if (count($list_rekam_medis) > 0) { ?>
	<table class="table table-stripped">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Pemilik</th>
				<th>Jenis Hewan</th>
				<th>Gejala</th>
				<th>Penyakit</th>
				<th>Terapi</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1; 
			foreach ($list_rekam_medis as $data) { ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= date('d/m/Y H:i:s', strtotime($data['tanggal'])) ?></td>
				<td><?= $data['nama'] ?></td>
				<td><?= $data['jenis_hewan'] ?></td>
				<td><?= substr($data['gejala'], 0, 16) ?>...</td>
				<td><?= substr($data['penyakit'], 0, 16) ?>...</td>
				<td><?= substr($data['terapi'], 0, 16) ?>...</td>
				<td>
					<a class="text-decoration-none" href="./petugas.php?page=jadwal/detail&nomor=<?= $data['id_jadwal'] ?>">
						<small>Lihat Detail</small>
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
<div class="my-3">
	<i>Riwayat rekam medis tidak ada.</i>
</div>
<?php } ?>