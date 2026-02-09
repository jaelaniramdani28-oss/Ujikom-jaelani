<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">
    <h1>Data Buku</h1>
    <a href="tambah_buku.php" class="btn btn-tambah">+ Tambah Buku</a>
    <br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($b = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $b['Judul'] ?></td>
            <td><?= $b['Penulis'] ?></td>
            <td><?= $b['Penerbit'] ?></td>
            <td><?= $b['Tahun'] ?></td>
            <td>
                <a class="btn btn-hapus" 
                   href="hapus_buku.php?id=<?= $b['Id_buku'] ?>"
                   onclick="return confirm('Hapus buku ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
