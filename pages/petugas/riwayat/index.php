<?php 
	$list_vaksinasi = require './modules/vaksinasi/list-vaksinasi-pemilik.php';
	$list_rekam_medis = require './modules/rekam-medis/list-rekam-medis-pemilik.php';
?>
<div>
	<h5>Riwayat Vaksinasi</h5>
	<?php if (count($list_vaksinasi) > 0) { ?>
		<table class="table table-stripped">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Pemilik</th>
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
				foreach ($list_vaksinasi as $vaksinasi) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= date('d/m/Y H:i:s', strtotime($vaksinasi['tanggal'])) ?></td>
					<td><?= $vaksinasi['nama'] ?></td>
					<td><?= $vaksinasi['jenis_hewan'] ?></td>
					<td><?= substr($vaksinasi['gejala'], 0, 16) ?>...</td>
					<td><?= substr($vaksinasi['penyakit'], 0, 16) ?>...</td>
					<td><?= substr($vaksinasi['terapi'], 0, 16) ?>...</td>
					<td>
						<a class="text-decoration-none" href="./pemilik.php?page=jadwal/detail&nomor=<?= $vaksinasi['id_jadwal'] ?>">
							<small>Lihat Detail</small>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } else { ?>
	<div class="my-3">
		<i>Riwayat vaksinasi tidak ada.</i>
	</div>
	<?php } ?>
</div>
<div class="mt-5">
	<h5>Rekam Medis</h5>
	<?php if (count($list_rekam_medis) > 0) { ?>
		<table class="table table-stripped">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Pemilik</th>
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
				foreach ($list_rekam_medis as $rekam_medis) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= date('d/m/Y H:i:s', strtotime($rekam_medis['tanggal'])) ?></td>
					<td><?= $rekam_medis['nama'] ?></td>
					<td><?= $rekam_medis['jenis_hewan'] ?></td>
					<td><?= substr($rekam_medis['gejala'], 0, 16) ?>...</td>
					<td><?= substr($rekam_medis['penyakit'], 0, 16) ?>...</td>
					<td><?= substr($rekam_medis['terapi'], 0, 16) ?>...</td>
					<td>
						<a class="text-decoration-none" href="./pemilik.php?page=jadwal/detail&nomor=<?= $rekam_medis['id_jadwal'] ?>">
							<small>Lihat Detail</small>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } else { ?>
	<div class="my-3">
		<i>Riwayat vaksinasi tidak ada.</i>
	</div>
	<?php } ?>
</div>