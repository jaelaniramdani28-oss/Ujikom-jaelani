<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$id_buku = intval($_POST['id_buku']);
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

$query_siswa = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username'");
$siswa = mysqli_fetch_assoc($query_siswa);

if (!$siswa) {
    echo "Data siswa tidak ditemukan!";
    exit;
}

$id_user = $siswa['id_anggota'];

$query_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id_buku");
$buku = mysqli_fetch_assoc($query_buku);

if ($buku['stok'] <= 0) {
    echo "<script>alert('Stok buku habis!'); window.history.back();</script>";
    exit;
}

$query_insert = "INSERT INTO transaksi (id_user, id_buku, tanggal_pinjam, tanggal_kembali, status) 
                 VALUES ('$id_user', '$id_buku', '$tgl_pinjam', '$tgl_kembali', 'dipinjam')";

if (mysqli_query($koneksi, $query_insert)) {
    mysqli_query($koneksi, "UPDATE buku SET stok = stok - 1 WHERE id=$id_buku");
    
    echo "<script>alert('Berhasil meminjam buku!'); window.location='transaksi_saya.php';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>