<?php $list_vaksinasi = require './modules/vaksinasi/list-vaksinasi.php'; ?>
<h3>Riwayat Vaksinasi</h3>
<?php if (count($list_vaksinasi) > 0) { ?>
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
					<a class="text-decoration-none" href="./petugas.php?page=jadwal/detail&nomor=<?= $vaksinasi['id_jadwal'] ?>">
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