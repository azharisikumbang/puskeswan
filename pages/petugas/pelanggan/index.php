<?php $list_pelanggan = require './modules/pengguna/list-pengguna.php'; ?>
<h3>Data Pendaftaran</h3>
<?php if (count($list_pelanggan) > 0) { ?>
	<table class="table table-stripped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemilik</th>
				<th>Jenis Kelamin</th>
				<th>Kontak</th>
				<th>Alamat</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1; 
			foreach ($list_pelanggan as $pelanggan) { ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $pelanggan['nama'] ?></td>
				<td><?= $pelanggan['kontak'] ?></td>
				<td><?= ($pelanggan['jenis_kelamin'] == '1') ? 'Laki - laki' : 'Perempuan'; ?></td>
				<td><?= $pelanggan['alamat'] ?></td>
				<td>
					<a href="./petugas.php?page=riwayat/index&pemilik=<?= $pelanggan['id'] ?>">Lihat Riwayat</a> |
					<a href="./petugas.php?page=jadwal/pemilik&pemilik=<?= $pelanggan['id'] ?>">Lihat Jadwal</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
<div class="my-3">
	<i>Daftar pelanggan tidak ada.</i>
</div>
<?php } ?>