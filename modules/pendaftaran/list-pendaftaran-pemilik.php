<?php 

require_once __DIR__ . '/../database/connection.php'; // $connection

$result = [];
$username = trim($_SESSION['username']);
$query = mysqli_query($connection, "SELECT daftar.id, daftar.tanggal, daftar.pemilik, daftar.jenis_hewan, daftar.usia_hewan, daftar.tujuan, daftar.status, akun.nama, akun.username FROM daftar JOIN akun ON akun.id = daftar.pemilik WHERE akun.username = '$username' ORDER BY daftar.tanggal desc");

if (!$query) {
	return $result;
}

while ($fetch = mysqli_fetch_assoc($query)) {
    $result[] = $fetch;
}

return $result;