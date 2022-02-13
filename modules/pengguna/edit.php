<?php 

require_once __DIR__ . '/../database/connection.php'; // $connection

session_start();

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$id = $_SESSION['akun_id'];
$hash_password = password_hash($password, PASSWORD_DEFAULT);
$query = mysqli_query($connection, "UPDATE akun set nama = '$nama', kontak = '$kontak', password = '$password', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', password = '$hash_password' WHERE id = $id");

if (!$query) {
	header('Location: ./pemilik.php?page=akun/pengaturan&status=error');
	exit();
}

header('Location: ./pemilik.php?page=akun/pengaturan&status=success');