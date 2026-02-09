<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $judul    = $_POST['judul'];
    $penulis  = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun'];

    mysqli_query($koneksi,
        "INSERT INTO buku (Judul, Penulis, Penerbit, Tahun)
         VALUES ('$judul', '$penulis', '$penerbit', '$tahun')"
    );

    header("Location: buku.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>

    <!-- SESUAIKAN NAMA FOLDER -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">
    <h1>Tambah Buku</h1>

    <div class="form-box">
        <form method="POST">
            <label>Judul Buku</label>
            <input type="text" name="judul" required>

            <label>Penulis</label>
            <input type="text" name="penulis" required>

            <label>Penerbit</label>
            <input type="text" name="penerbit" required>

            <label>Tahun Terbit</label>
            <input type="number" name="tahun" required>

            <button type="submit" name="simpan" class="btn">
                Simpan
            </button>

            <a href="buku.php" class="btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>

</body>
</html>
