<?php
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$db   = "Peminjaman_buku_perpustakaan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
