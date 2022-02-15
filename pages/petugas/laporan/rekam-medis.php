<?php $list_rekam_medis = require './modules/rekam-medis/list-rekam-medis.php'; ?>
<div style="text-align: right">
	<a href="./module.php?module=exporter&action=rekam-medis">Download</a>
</div>
<div>
	<div style="text-align: center; border-bottom: 2px solid #000">
		<h2>DINAS PERTANIAN PANGAN DAN PERINGATAN</h2>
		<h2>UPT PUSKESMAS & INSEMINASI BUATAN</h2>
		<p>Jl. SENTOT ALI BASA JADI MUDIK, PADIAMAN TENGAH</p>
		<p>KOTA PARIAMAN</p>
	</div>
	<div style="margin: 12px 0">
		<h3>REKAM MEDIS</h3>
	</div>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th style="font-weight: bold; text-align: center; border: 1px solid #000">No</th>
				<th style="font-weight: bold; text-align: center; border: 1px solid #000">Tanggal</th>
				<th style="font-weight: bold; text-align: center; border: 1px solid #000">Nama Pemilik</th>
				<th style="font-weight: bold; text-align: center; border: 1px solid #000">Hewan</th>
				<th style="font-weight: bold; text-align: center; border: 1px solid #000">Gejala</th>
				<th style="font-weight: bold; text-align: center; border: 1px solid #000">Penyakit</th>
				<th style="font-weight: bold; text-align: center; border: 1px solid #000">Terapi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1; 
				foreach ($list_rekam_medis as $data) { ?>
				<tr>
					<td style="border: 1px solid #000; padding: 2px 4px; text-align: center;"><?= $no++; ?></td>
					<td style="border: 1px solid #000; padding: 2px 4px"><?= date('d/m/Y H:i:s', strtotime($data['tanggal'])) ?></td>
					<td style="border: 1px solid #000; padding: 2px 4px"><?= $data['nama'] ?></td>
					<td style="border: 1px solid #000; padding: 2px 4px"><?= $data['jenis_hewan'] ?></td>
					<td style="border: 1px solid #000; padding: 2px 4px"><?= $data['gejala'] ?></td>
					<td style="border: 1px solid #000; padding: 2px 4px"><?= $data['penyakit'] ?></td>
					<td style="border: 1px solid #000; padding: 2px 4px"><?= $data['terapi'] ?></td>
				</tr>
				<?php } ?>
		</tbody>
	</table>
	<div style="text-align: right; margin-top: 30px">
		<div style="width: 280px; text-align: center; float: right">
			<div style="">Pariaman, ....................................... 20....</div>
			<div style="font-weight: bold">Dokter Hewan Penanggung Jawab</div>
			<div style="margin-top: 140px">(.........................................................)</div>
		</div>
		<div style="clear: both;"></div>
	</div>
</div>