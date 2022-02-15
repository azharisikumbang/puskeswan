<?php 

if (!isset($_POST)) {
	header('Location: index.php?page=errors/not-found');
	exit();
}

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$level = 'ADMIN'; // admin
$kontak = $_POST['kontak'];

$query = mysqli_query($connection, "INSERT INTO pengguna (nama, username, password, level, kontak) VALUES ('$nama', '$username', '$password', '$level', '$kontak')");

if (!$query) {
	header('Location: index.php?page=pengguna/tambah&error=1'); 	
} 

header('Location: ./index.php?page=pengguna/index');
