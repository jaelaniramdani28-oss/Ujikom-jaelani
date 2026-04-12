<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'"));

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];

    mysqli_query($koneksi, "UPDATE buku SET 
        judul='$judul',
        penulis='$penulis',
        tahun='$tahun'
        WHERE id='$id'
    ");

    header("Location: data_buku.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Buku</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #f4f6f9;
}

/* CONTENT */
.content {
    margin-left: 220px;
    padding: 20px;
}

.form-container {
    background: white;
    padding: 25px;
    border-radius: 10px;
    max-width: 500px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

.form-container h2 {
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
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

.back {
    display: inline-block;
    margin-top: 10px;
    text-decoration: none;
    color: #2c3e50;
}
</style>

</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">

    <div class="form-container">
        <h2>Edit Buku</h2>

        <form method="POST">
            <input type="text" name="judul" value="<?= $data['judul'] ?>" required>
            <input type="text" name="penulis" value="<?= $data['penulis'] ?>" required>
            <input type="number" name="tahun" value="<?= $data['tahun'] ?>" required>

            <button name="update">Update</button>
        </form>

        <a href="data_buku.php" class="back">← Kembali</a>
    </div>

</div>

</body>
</html>