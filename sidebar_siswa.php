<style>
.sidebar {
    width: 220px;
    height: 100vh;
    background: #34495e;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
}

.sidebar h2 {
    text-align: center;
    padding: 20px;
    border-bottom: 1px solid #4e6a85;
    font-size: 18px;
    letter-spacing: 2px;
}

/* Container untuk navigasi */
.sidebar-menu {
    margin-top: 10px;
}

.sidebar a {
    display: block;
    padding: 15px 20px;
    color: #ecf0f1;
    text-decoration: none;
    transition: 0.3s;
    font-size: 15px;
    display: flex;
    align-items: center;
}

.sidebar a:hover {
    background: #2c3e50;
    padding-left: 30px; /* Efek geser saat hover */
    color: #3498db;
}

.sidebar a.logout {
    border-top: 1px solid #4e6a85;
    margin-top: 20px;
    color: #e74c3c;
}

.sidebar a.logout:hover {
    background: #c0392b;
    color: white;
}
</style>

<div class="sidebar">
    <h2>SISWA</h2>

    <div class="sidebar-menu">
        <a href="profil_siswa.php">👤 Profil Saya</a> 
        <a href="dashboard_siswa.php">🏠 Dashboard</a>
        <a href="daftar_buku.php">📚 Daftar Buku</a>
        <a href="transaksi_saya.php">📄 Transaksi Saya</a>
        <a href="logout.php" class="logout">🚪 Logout</a>
    </div>
</div>