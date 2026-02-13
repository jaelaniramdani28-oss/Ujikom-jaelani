<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cari user di database
$query = mysqli_query($koneksi,
    "SELECT * FROM anggota 
     WHERE username='$username' 
     AND password='$password'"
);

$cek = mysqli_num_rows($query);

if ($cek > 0) {

    $data = mysqli_fetch_assoc($query);

    $_SESSION['username'] = $data['username'];
    $_SESSION['status']   = $data['status'];

    // Arahkan sesuai status
    if ($data['status'] == 'admin') {
        header("Location: dashboard.php");
    } else {
        header("Location: customer.php");
    }
    exit;

} else {
    echo "Login gagal";
}
