<style>
.sidebar {
    width: 220px;
    height: 100vh;
    background: #2c3e50;
    color: white;
    position: fixed;
    left: 0;
    top: 0;
}

.sidebar h2 {
    text-align: center;
    padding: 20px;
    border-bottom: 1px solid #444;
}

.sidebar a {
    display: block;
    padding: 15px;
    color: white;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #34495e;
}
</style>

<div class="sidebar">
    <h2>PBP Admin</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
     <a href="data_anggota.php">👤 lihat data Anggota</a>
    <a href="data_buku.php">📚 Data Buku</a>
    <a href="data_transaksi.php">📊 data transaksi</a>
    <a href="logout.php">🚪 Logout</a>
</div>