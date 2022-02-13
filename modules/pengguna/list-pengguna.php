<?php 

require_once __DIR__ . '/../database/connection.php'; // $connection

$query = mysqli_query($connection, "SELECT id, nama, kontak, alamat, username, jenis_kelamin FROM akun WHERE level = 'PEMILIK'");

if (!$query) return [];

$result = [];
while ($fetch = mysqli_fetch_assoc($query)) {
    $result[] = $fetch;
}

return $result;