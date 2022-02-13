<?php

require_once __DIR__ . '/../database/connection.php'; // $connection

if (!isset($_GET['nomor'])) {
	header('Location: index.php?page=errors/not-found');
	exit();
}

mysqli_begin_transaction($connection);

try {
	$nomor = $_GET['nomor'];
	mysqli_query($connection, "UPDATE daftar set status = 'DISETUJUI' where id = '$nomor'");
	$query = mysqli_query($connection, "SELECT * from daftar where id = '$nomor'");
	$pendaftaran = mysqli_fetch_assoc($query);
	$id_daftar = $pendaftaran['id'];
	$tanggal = $pendaftaran['tanggal'];

	mysqli_query($connection, "INSERT INTO jadwal (id_daftar, tanggal) VALUES ($id_daftar, '$tanggal')");

    mysqli_commit($connection);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($connection);

    throw $exception;
}

header('Location: petugas.php?page=pendaftaran/detail&nomor=' . $nomor);
