<?php
session_start();
include 'koneksi.php';
include 'sidebar2.php';

$query = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<div class="content">
    <h2>📚 Daftar Buku</h2>

    <table border="1" cellpadding="10" width="100%">
        <tr style="background:#e2e8f0;">
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
        </tr>

        <?php
        $no = 1;
        while ($buku = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $buku['Judul']; ?></td>
            <td><?= $buku['Penulis']; ?></td>
            <td><?= $buku['Penerbit']; ?></td>
            <td><?= $buku['Tahun']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
