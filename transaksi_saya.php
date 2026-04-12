<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['id_anggota'])) {
    header("Location: login.php");
    exit;
}

$id_user_login = $_SESSION['id_anggota']; 
$nama_user = $_SESSION['nama']; 

if (isset($_POST['hapus_riwayat'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_user = '$id_user_login'");
    if ($hapus) {
        echo "<script>alert('Semua riwayat transaksi Anda berhasil dihapus!'); window.location='transaksi_saya.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus riwayat!');</script>";
    }
}

$query = mysqli_query($koneksi, "
    SELECT t.*, b.judul 
    FROM transaksi t
    JOIN buku b ON t.id_buku = b.id
    WHERE t.id_user = '$id_user_login'
    ORDER BY t.id_transaksi DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Saya - Perpustakaan</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f9; margin: 0; }
        .container { margin-left: 240px; padding: 30px; }
        .header-flex { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 25px; }
        h2 { color: #1e293b; margin: 0; }
        p { color: #64748b; margin: 5px 0 0 0; }
        
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        th { background: #2563eb; color: white; padding: 15px; text-align: left; font-size: 13px; }
        td { padding: 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; }
        tr:hover { background-color: #f8fafc; }

        .badge { padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; }
        .badge-pinjam { background: #fef3c7; color: #92400e; }
        .badge-kembali { background: #dcfce7; color: #166534; }

        .btn-kembali {
            background: #f59e0b; color: white; padding: 6px 12px; 
            text-decoration: none; border-radius: 5px; font-size: 12px; transition: 0.2s;
        }
        .btn-kembali:hover { background: #d97706; }

        .btn-hapus {
            background: #fee2e2; color: #b91c1c; border: 1px solid #f87171; 
            padding: 8px 15px; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: pointer;
        }
        .btn-hapus:hover { background: #fecaca; }

        .text-done { color: #10b981; font-weight: bold; }
    </style>
</head>
<body>

<?php include 'sidebar_siswa.php'; ?>

<div class="container">
    <div class="header-flex">
        <div>
            <h2>Riwayat Peminjaman</h2>
            <p>Menampilkan data untuk: <strong><?= htmlspecialchars($nama_user) ?></strong></p>
        </div>
        
        <?php if (mysqli_num_rows($query) > 0) : ?>
        <form method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua riwayat transaksi Anda?')">
            <button type="submit" name="hapus_riwayat" class="btn-hapus">
                🗑️ Bersihkan Riwayat
            </button>
        </form>
        <?php endif; ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Batas Kembali</th>
                <th>Status</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if (mysqli_num_rows($query) > 0) {
                while ($d = mysqli_fetch_assoc($query)) : 
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><strong><?= htmlspecialchars($d['judul']) ?></strong></td>
                <td><?= date('d/m/Y', strtotime($d['tanggal_pinjam'])) ?></td>
                <td><?= date('d/m/Y', strtotime($d['tanggal_kembali'])) ?></td>
                <td>
                    <?php if ($d['status'] == 'dipinjam') : ?>
                        <span class="badge badge-pinjam">📍 Dipinjam</span>
                    <?php else : ?>
                        <span class="badge badge-kembali">✅ Kembali</span>
                    <?php endif; ?>
                </td>
                <td style="text-align: center;">
                    <?php if ($d['status'] == 'dipinjam') : ?>
                        <a href="proses_kembali.php?id=<?= $d['id_transaksi'] ?>&id_buku=<?= $d['id_buku'] ?>" 
                           class="btn-kembali"
                           onclick="return confirm('Apakah buku ini sudah dikembalikan?')">
                           Kembalikan
                        </a>
                    <?php else : ?>
                        <span class="text-done">Selesai</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php 
                endwhile; 
            } else {
                echo "<tr><td colspan='6' style='text-align:center; padding:30px; color:#94a3b8;'>Kamu belum pernah meminjam buku apapun.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>