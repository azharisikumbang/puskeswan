<?php 

require_once __DIR__ . '/../database/connection.php'; // $connection

$nomor = $_GET['nomor'];
$query = mysqli_query($connection, "
	SELECT 
		jadwal.id, jadwal.tanggal, jadwal.status, 
		daftar.id, daftar.pemilik, daftar.jenis_hewan, daftar.tujuan, daftar.usia_hewan, 
		akun.nama, akun.username, akun.kontak, akun.alamat, akun.jenis_kelamin as jenis_kelamin_pemilik,
		rekam_medis.tanggal as tanggal_rekam_medis, rekam_medis.gejala as gejala_rekam_medis, rekam_medis.penyakit as penyakit_rekam_medis, rekam_medis.terapi as terapi_rekam_medis, 
		vaksinasi.tanggal as tanggal_vaksinasi, vaksinasi.gejala as gejala_vaksinasi, vaksinasi.penyakit as penyakit_vaksinasi, vaksinasi.terapi as terapi_vaksinasi
	FROM jadwal 
	LEFT JOIN daftar ON jadwal.id_daftar = daftar.id 
	LEFT JOIN akun ON akun.id = daftar.pemilik 
	LEFT JOIN rekam_medis ON rekam_medis.id_jadwal = jadwal.id
	LEFT JOIN vaksinasi ON vaksinasi.id_jadwal = jadwal.id
	WHERE jadwal.id = '$nomor'");

if (!$query) return [];

return mysqli_fetch_assoc($query) ?? [] ;