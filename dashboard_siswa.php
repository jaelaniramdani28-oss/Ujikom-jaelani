<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

$queryUser = mysqli_query($koneksi, "SELECT id_anggota FROM anggota WHERE username='$username'");
$dataUser  = mysqli_fetch_assoc($queryUser);

if ($dataUser) {
    $id_user_login = $dataUser['id_anggota'];

    $queryDipinjam = mysqli_query($koneksi, "
        SELECT COUNT(*) as total 
        FROM transaksi 
        WHERE id_user='$id_user_login' AND status='dipinjam'
    ");
    $dataDipinjam = mysqli_fetch_assoc($queryDipinjam);
    $dipinjam = $dataDipinjam['total'];
} else {
    $dipinjam = 0;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <style>
        body { margin: 0; font-family: Arial; background: #f4f6f9; }
        .content { margin-left: 240px; padding: 20px; }
        .card {
            background: white; 
            padding: 25px; 
            border-radius: 12px; 
            width: 300px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-left: 5px solid #f39c12
            
        }
        .card h3 { margin: 0; color: #7f8c8d; font-size: 16px; }
        .card h2 { margin: 10px 0 0; font-size: 36px; color: #2c3e50; }
    </style>
</head>
<body>

<?php include 'sidebar_siswa.php'; ?>

<div class="content">
    <h1>Halo, <?= htmlspecialchars($username) ?> 👋</h1>

    <div class="card">
        <h3>Buku Sedang Dipinjam</h3>
        <h2><?= $dipinjam ?></h2>
    </div>
</div>

</body>
</html>