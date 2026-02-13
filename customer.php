<?php
session_start();
include 'sidebar2.php';
?>

<div class="content">
    <h2>Dashboard Customer</h2>
    <p>Selamat datang, <b><?= $_SESSION['username']; ?></b></p>
</div>
