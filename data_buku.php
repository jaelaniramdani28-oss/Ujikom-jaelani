<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['tambah'])) {
    $judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $tahun   = $_POST['tahun'];
    $stok    = $_POST['stok'];

    mysqli_query($koneksi, "INSERT INTO buku (judul, penulis, tahun, stok) 
                            VALUES ('$judul', '$penulis', '$tahun', '$stok')");

    header("Location: data_buku.php");
    exit;
}

if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
    header("Location: data_buku.php");
    exit;
}

$data = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Buku</title>

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

h1 {
    margin-bottom: 10px;
}

form {
    background: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

input {
    padding: 10px;
    margin: 5px;
    width: 180px;
}

button {
    padding: 10px 15px;
    background: #2c3e50;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background: #34495e;
}

.btn-stok {
    display: inline-block;
    margin-bottom: 15px;
    padding: 10px 15px;
    background: #27ae60;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.btn-stok:hover {
    background: #219150;
}

table {
    width: 100%;
    background: white;
    border-collapse: collapse;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

th {
    background: #2c3e50;
    color: white;
}

.action a {
    margin-right: 10px;
    text-decoration: none;
    color: blue;
}

.stok-habis {
    color: red;
    font-weight: bold;
}

.stok-ada {
    color: green;
    font-weight: bold;
}
</style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">

    <h1>Data Buku</h1>

    <a href="stok_buku.php" class="btn-stok">Kelola Stok Buku</a>

    <form method="POST">
        <input type="text" name="judul" placeholder="Judul Buku" required>
        <input type="text" name="penulis" placeholder="Penulis" required>
        <input type="number" name="tahun" placeholder="Tahun" required>
        <input type="number" name="stok" placeholder="Stok" required>
        <button type="submit" name="tambah">Tambah Buku</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['penulis'] ?></td>
            <td><?= $row['tahun'] ?></td>
            <td class="<?= $row['stok'] <= 0 ? 'stok-habis' : 'stok-ada' ?>">
                <?= $row['stok'] ?>
            </td>
            <td class="action">
                <a href="edit_buku.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>