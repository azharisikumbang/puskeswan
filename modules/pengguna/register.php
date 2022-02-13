<?php 

if (!isset($_POST)) {
	header('Location: index.php?page=errors/not-found');
	exit();
}

session_start();

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$username = trim(str_replace(' ', '', strtolower($_POST['username'])));
$password = $_POST['password'];
$password_ulang = $_POST['password_ulang'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];

if ($password !== $password_ulang) {
	header('Location: index.php?page=register&status=error'); 
	exit();
}

$password = password_hash($password, PASSWORD_DEFAULT);
$query = mysqli_query($connection, "INSERT INTO akun (nama, kontak, username, password, alamat, jenis_kelamin) VALUES ('$nama', '$kontak', '$username', '$password', '$alamat', '$jenis_kelamin')");

if (!$query) {
	header('Location: index.php?page=register&status=error'); 
	exit();
}

$_SESSION['username'] = $username;
$_SESSION['akun_id'] = mysqli_insert_id($connection);
$_SESSION['level'] = 'PEMILIK';

header('Location: pemilik.php?page=index'); 