<?php

if ($_SESSION['username'] != null) {
	$page = 'pemilik.php?page=index';
	if ($_SESSION['level'] == 'PETUGAS') {
		$page = 'petugas.php?page=index';
	}

	header('Location: ' . $page); 
	exit();
}

$username = $_POST['username'];
$query = mysqli_query($connection, "SELECT id, username, password, level FROM akun where username = '$username' limit 1");

if ($query) {
	$akun = mysqli_fetch_assoc($query);

	if (password_verify($_POST['password'], $akun['password'])) {
		session_start();

		$_SESSION['username'] = $username;
		$_SESSION['akun_id'] = $akun['id'];
		$_SESSION['level'] = $akun['level'];

		$page = 'pemilik.php?page=index';
		if ($akun['level'] == 'PETUGAS') {
			$page = 'petugas.php?page=index';
		}

		header('Location: ' . $page); 
		exit();
	}
}

header('Location: index.php?page=login&error=1'); 
