<?php 

require_once __DIR__ . '/../database/connection.php'; // $connection

$result = [];
$query = mysqli_query($connection, "SELECT jadwal.id, jadwal.tanggal, DATE(jadwal.tanggal) as harian, jadwal.status, daftar.id as id_daftar, daftar.pemilik, daftar.jenis_hewan, daftar.tujuan, daftar.usia_hewan, akun.nama, akun.username FROM jadwal JOIN daftar ON jadwal.id_daftar = daftar.id JOIN akun ON akun.id = daftar.pemilik ORDER BY harian desc");

if (!$query) return $result;

while ($fetch = mysqli_fetch_assoc($query)) {
    $result[$fetch['harian']][] = $fetch;
}

return $result;