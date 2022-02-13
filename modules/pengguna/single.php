<?php

require_once __DIR__ . '/../database/connection.php'; // $connection

$username = $_SESSION['username'];
$query = mysqli_query($connection, "SELECT id, nama, kontak, alamat, jenis_kelamin FROM akun where username = '$username'");

return mysqli_fetch_assoc($query) ?? [];