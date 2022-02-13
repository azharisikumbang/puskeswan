<?php 

session_start();

if (!isset($_POST)) {
	header('Location: index.php?page=errors/not-found');
	exit();
}

$tanggal = date('Y-m-d H:i:s', strtotime($_POST['tanggal']));
$pemilik = $_SESSION['akun_id'];
$jenis_hewan = $_POST['jenis_hewan'];
$usia_hewan = $_POST['usia_hewan'];
$tujuan = $_POST['tujuan'];

$query = mysqli_query($connection, "INSERT INTO daftar (tanggal, pemilik, jenis_hewan, usia_hewan, tujuan) VALUES ('$tanggal', '$pemilik', '$jenis_hewan', '$usia_hewan', '$tujuan')");

if (!$query) {
	header('Location: pemilik.php?page=pendaftaran/buat&error=1'); 	
} 

header('Location: ./pemilik.php?page=pendaftaran/index');
