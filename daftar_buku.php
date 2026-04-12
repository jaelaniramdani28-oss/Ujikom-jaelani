<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Buku</title>

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

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.card-body h3 {
    margin: 0;
    font-size: 18px;
}

.card-body p {
    margin: 5px 0;
    color: #555;
    font-size: 14px;
}

.btn {
    display: block;
    margin-top: 10px;
    padding: 10px;
    text-align: center;
    background: #27ae60;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s;
}

.btn:hover {
    background: #219150;
}

.stok {
    font-weight: bold;
}

.habis {
    color: red;
}
</style>
</head>

<body>

<?php include 'sidebar_siswa.php'; ?>

<div class="content">
    <h1>📚 Daftar Buku</h1>
    <p>Pilih buku yang ingin kamu pinjam</p>

    <div class="grid">
        <?php while($b = mysqli_fetch_assoc($query)) : ?>
        <div class="card">
            <div class="card-body">
                <h3><?= htmlspecialchars($b['judul']) ?></h3>
                <p>Penulis: <?= htmlspecialchars($b['penulis']) ?></p>
                <p>Tahun: <?= htmlspecialchars($b['tahun']) ?></p>

                <p class="stok">
                    Stok:
                    <span class="<?= ($b['stok'] == 0) ? 'habis' : '' ?>">
                        <?= $b['stok'] ?>
                    </span>
                </p>

                <?php if ($b['stok'] > 0) : ?>
                    <a href="pinjam.php?id_buku=<?= $b['id'] ?>" class="btn">
                        📥 Pinjam
                    </a>
                <?php else : ?>
                    <div class="btn" style="background: gray;">Stok Habis</div>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>