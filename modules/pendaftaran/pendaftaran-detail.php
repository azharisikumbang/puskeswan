<?php 

require_once __DIR__ . '/../database/connection.php'; // $connection

$nomor = $_GET['nomor'];
$query = mysqli_query($connection, "SELECT daftar.id, daftar.tanggal, daftar.pemilik, daftar.jenis_hewan, daftar.tujuan, daftar.usia_hewan, daftar.status, akun.nama, akun.username, akun.kontak, akun.alamat, akun.jenis_kelamin as jenis_kelamin_pemilik FROM daftar JOIN akun ON akun.id = daftar.pemilik WHERE daftar.id = $nomor");

if (!$query) return [];

return mysqli_fetch_assoc($query) ?? [] ;
