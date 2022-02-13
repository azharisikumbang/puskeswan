<?php 

session_start();

if (!isset($_POST)) {
	header('Location: index.php?page=errors/not-found');
	exit();
}

mysqli_begin_transaction($connection);

try {

	$tanggal = date('Y-m-d H:i:s', strtotime($_POST['tanggal']));
	$gejala = $_POST['gejala'];
	$penyakit = $_POST['penyakit'];
	$terapi = $_POST['terapi'];
	$id_jadwal = $_POST['id_jadwal'];

	$query = mysqli_query($connection, "SELECT jadwal.id, daftar.tujuan, daftar.id as id_daftar FROM jadwal JOIN daftar ON jadwal.id_daftar = daftar.id WHERE jadwal.id = $id_jadwal");
	$jadwal = mysqli_fetch_assoc($query);

	$tujuan = in_array($jadwal['tujuan'], ['vaksinasi', 'rekam_medis']);

	if (!$tujuan) {
		header('Location: petugas.php?page=diagnosa/buat&error=1');
		exit();
	} 

	mysqli_query($connection, "INSERT INTO {$jadwal['tujuan']} (tanggal, gejala, penyakit, terapi, id_jadwal) VALUES ('$tanggal', '$gejala', '$penyakit', '$terapi', $id_jadwal)");

	mysqli_query($connection, "UPDATE jadwal set status = 'SELESAI' WHERE id = $id_jadwal");

    mysqli_commit($connection);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($connection);

    throw $exception;
}

header("Location: ./petugas.php?page=jadwal/detail&nomor=" . $id_jadwal);
