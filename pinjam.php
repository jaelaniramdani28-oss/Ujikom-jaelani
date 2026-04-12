<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id_buku'])) {
    echo "Buku tidak ditemukan!";
    exit;
}

$id_buku = intval($_GET['id_buku']);

$query_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = $id_buku");
$buku = mysqli_fetch_assoc($query_buku);

if (!$buku) {
    echo "Buku tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pinjam Buku</title>
    <style>
        body { font-family: Arial; background: #f4f6f9; }
        .container { width: 400px; margin: 80px auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, button { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; }
        button { background: #27ae60; color: white; border: none; cursor: pointer; margin-top: 20px; }
        button:hover { background: #219150; }
    </style>
</head>
<body>

<?php include 'sidebar_siswa.php'; ?>

<div class="container">
    <h2>📚 Pinjam Buku</h2>
    <p>Buku: <b><?= htmlspecialchars($buku['judul']) ?></b></p>

    <form method="POST" action="proses_pinjam.php">
        <input type="hidden" name="id_buku" value="<?= $buku['id'] ?>">

        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" value="<?= date('Y-m-d') ?>" required>

        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" required>

        <button type="submit">Pinjam Sekarang</button>
    </form>
</div>

</body>
</html>