<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['update'])) {
    $id   = $_POST['id'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "UPDATE buku SET stok='$stok' WHERE id='$id'");
    header("Location: stok_buku.php");
    exit;
}

$data = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Stok Buku</title>

<style>
body {
    font-family: Arial;
    background: #f4f6f9;
}

.container {
    margin-left: 220px;
    padding: 20px;
}

.card {
    background: white;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

input {
    padding: 8px;
    width: 80px;
}

button {
    padding: 8px 12px;
    background: green;
    color: white;
    border: none;
    cursor: pointer;
}
</style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="container">
    <h2>Kelola Stok Buku</h2>

    <?php while($row = mysqli_fetch_assoc($data)) { ?>
        <div class="card">
            <b><?= $row['judul'] ?></b><br>
            Stok sekarang: <?= $row['stok'] ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="number" name="stok" value="<?= $row['stok'] ?>" required>
                <button name="update">Update</button>
            </form>
        </div>
    <?php } ?>

</div>

</body>
</html>