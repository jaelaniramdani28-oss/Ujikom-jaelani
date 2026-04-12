<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id']) && isset($_GET['id_buku'])) {
    $id_transaksi = intval($_GET['id']);
    $id_buku = intval($_GET['id_buku']);

    $update_transaksi = mysqli_query($koneksi, "UPDATE transaksi SET status = 'kembali' WHERE id_transaksi = $id_transaksi");

    if ($update_transaksi) {
        mysqli_query($koneksi, "UPDATE buku SET stok = stok + 1 WHERE id = $id_buku");

        echo "<script>
                alert('Buku berhasil dikembalikan!');
                window.location = 'transaksi_saya.php';
              </script>";
    } else {
        echo "Gagal memproses pengembalian: " . mysqli_error($koneksi);
    }
} else {
    header("Location: transaksi_saya.php");
}
?>