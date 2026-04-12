<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$query = mysqli_query($koneksi, "
    SELECT 
        t.*, 
        b.judul, 
        a.nama as nama_peminjam, 
        a.username as username_peminjam
    FROM transaksi t
    JOIN buku b ON t.id_buku = b.id
    JOIN anggota a ON t.id_user = a.id_anggota
    ORDER BY t.id_transaksi DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi Perpustakaan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 0; }
        .content { margin-left: 240px; padding: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #34495e; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .badge { padding: 5px 10px; border-radius: 4px; font-size: 12px; color: white; }
        .bg-orange { background: #e67e22; }
        .bg-green { background: #27ae60; }
    </style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">
    <h2>📊 Semua Transaksi Peminjaman</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) : 
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <strong><?= htmlspecialchars($row['nama_peminjam']) ?></strong><br>
                    <small style="color: #7f8c8d;">Username: <?= htmlspecialchars($row['username_peminjam']) ?></small>
                </td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= date('d/m/Y', strtotime($row['tanggal_pinjam'])) ?></td>
                <td><?= date('d/m/Y', strtotime($row['tanggal_kembali'])) ?></td>
                <td>
                    <?php if ($row['status'] == 'dipinjam') : ?>
                        <span class="badge bg-orange">Sedang Dipinjam</span>
                    <?php else : ?>
                        <span class="badge bg-green">Sudah Kembali</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>