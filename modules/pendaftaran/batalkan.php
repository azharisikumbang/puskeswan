<?php

require_once __DIR__ . '/../database/connection.php'; // $connection

$nomor = $_GET['nomor'];
$query = mysqli_query($connection, "UPDATE daftar set status = 'BATAL' where id = '$nomor'");

if (!$query) {
	header('Location: pemilik.php?page=pendaftaran/index&error=1&nomor=' . $nomor);
	exit();
}

header('Location: pemilik.php?page=pendaftaran/index&nomor=' . $nomor);
