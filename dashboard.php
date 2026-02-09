<?php
include 'koneksi.php';

$jml_buku = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku"));
$jml_anggota = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM anggota"));
$jml_transaksi = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">
    <h1>Dashboard</h1>

    <div class="card">📘 Jumlah Buku: <b><?= $jml_buku ?></b></div>
    <div class="card">👤 Jumlah Anggota: <b><?= $jml_anggota ?></b></div>
    <div class="card">🔄 Jumlah Transaksi: <b><?= $jml_transaksi ?></b></div>
</div>

</body>
</html>
