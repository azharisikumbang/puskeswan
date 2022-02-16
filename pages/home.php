<?php 
$site = [
	'operasional' => [
		'Senin' 	=> ['07.30', '16.00'],
		'Selasa' 	=> ['07.30', '16.00'],
		'Rabu' 		=> ['07.30', '16.00'],
		'Kamis' 	=> ['07.30', '16.00'],
		'Jumat' 	=> ['07.30', '16.00'],
		'Sabtu' 	=> ['-', '-'],
		'Minggu' 	=> ['-', '-']
	],
];
?>
<!-- @background : https://unsplash.com/photos/bg9jOHUtmBs -->
<header class="py-5" style="background: url('./files/background-1.jpg'); background-position: center center; background-repeat: no-repeat; background-size: 100%;">
    <div class="container px-4 px-lg-5 my-5 py-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Rawat Kesehatan Peliharan Anda</h1>
            <a href="./index.php?page=login" class="btn btn-danger px-4">Jadwalkan Pemeriksaan</a>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="text-center mb-5">
            <h3>Jadwal Pemeriksaan</h3>
        </div>
        <div class="mb-4">
            <strong>Tanggal : <?= date('d/m/Y') ?></strong>
        </div>
        <form action="./module.php?module=pesanan&action=keranjang" method="post">
            <table class="table table-hover table-bordered text-center">
              <thead>
              	<tr>
              		<th></th>
              		<th>Jam Buka</th>
              		<th>Jam Tutup</th>
              	</tr>
              </thead>
              <tbody>
              	<?php foreach ($site['operasional'] as $hari => $operasional) { ?>
              	<tr>
              		<td><?= $hari ?></td>
              		<td><?= $operasional[0] ?></td>
              		<td><?= $operasional[1] ?></td>
              	</tr>
              	<?php } ?>
              </tbody>
            </table>
        </form>
    </div>
</section>


