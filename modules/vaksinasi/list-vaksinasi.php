<?php 

require_once __DIR__ . '/../database/connection.php'; // $connection

$result = [];
$query = mysqli_query($connection, "SELECT vaksinasi.*, akun.nama, daftar.jenis_hewan, jadwal.id as id_jadwal FROM vaksinasi JOIN jadwal ON jadwal.id = vaksinasi.id_jadwal JOIN daftar ON daftar.id = jadwal.id_daftar JOIN akun ON akun.id = daftar.pemilik ORDER BY vaksinasi.tanggal desc");

if (!$query) {
	return $result;
}

while ($fetch = mysqli_fetch_assoc($query)) {
    $result[] = $fetch;
}

return $result;