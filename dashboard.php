<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$jml_buku      = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM buku"))['total'];
$jml_anggota   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM anggota"))['total'];
$jml_transaksi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM transaksi"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #f4f6f9;
}

.content {
    margin-left: 220px;
    padding: 20px;
}

.cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.card {
    flex: 1;
    min-width: 200px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    text-align: center;
}
</style>

</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">

    <h1>Dashboard Admin</h1>

    <div class="cards">
        <div class="card">
            <h2><?= $jml_buku ?></h2>
            <p>Total Buku</p>
        </div>

        <div class="card">
            <h2><?= $jml_anggota ?></h2>
            <p>Total Anggota</p>
        </div>

        <div class="card">
            <h2><?= $jml_transaksi ?></h2>
            <p>Total Transaksi</p>
        </div>
    </div>

</div>

</body>
</html>