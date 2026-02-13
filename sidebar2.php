<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['status']) || $_SESSION['status'] != 'customer') {
    header("Location: login.php");
    exit;
}
?>

<style>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 230px;
    height: 100vh;
    background-color: #1e293b;
    color: white;
    padding-top: 20px;
}

.sidebar .title {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
}

.sidebar a:hover {
    background-color: #334155;
}

.content {
    margin-left: 230px;
    padding: 20px;
}
</style>

<div class="sidebar">
    <div class="title">Customer</div>
    <a href="customer.php">🏠 Dashboard</a>
    <a href="buku2.php">📚 Daftar Buku</a>
    <a href="transaksi_customer.php">🔄 Transaksi</a>
    <a href="logout.php">🚪 Logout</a>
</div>
