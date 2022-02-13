<?php

require_once __DIR__ . '/../database/connection.php'; // $connection

$nomor = $_POST['id_daftar'];
$tanggal = date('Y-m-d H:i:s', strtotime($_POST['tanggal']));
$jenis_hewan = $_POST['jenis_hewan'];
$usia_hewan = $_POST['usia_hewan'];
$tujuan = $_POST['tujuan'];
$query = mysqli_query($connection, "UPDATE daftar set tanggal = '$tanggal', jenis_hewan = '$jenis_hewan', usia_hewan = '$usia_hewan', tujuan = '$tujuan' where id = '$nomor'");

if (!$query) {
	header('Location: petugas.php?page=pendaftaran/index&error=1&nomor=' . $nomor);
	exit();
}

header('Location: petugas.php?page=pendaftaran/detail&nomor=' . $nomor);
