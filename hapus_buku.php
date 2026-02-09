<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM buku WHERE Id_buku='$id'");

header("Location: buku.php");
?>
