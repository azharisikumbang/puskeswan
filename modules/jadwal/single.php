<?php 

require_once __DIR__ . '/../database/connection.php'; // $connection

$nomor = $_GET['nomor'];
$query = mysqli_query($connection, "SELECT 
		jadwal.id, jadwal.tanggal, jadwal.status, 
		daftar.id as id_daftar, daftar.pemilik, daftar.jenis_hewan, daftar.tujuan, daftar.usia_hewan, 
		akun.nama, akun.username, akun.kontak, akun.alamat, akun.jenis_kelamin as jenis_kelamin_pemilik
	FROM jadwal 
	LEFT JOIN daftar ON jadwal.id_daftar = daftar.id 
	LEFT JOIN akun ON akun.id = daftar.pemilik 
	WHERE jadwal.id = '$nomor'");

if (!$query) return [];

return mysqli_fetch_assoc($query) ?? [] ;