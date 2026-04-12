<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Anggota</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #f4f6f9;
}

.content {
    margin-left: 220px;
    padding: 20px;
}

h1 {
    margin-bottom: 20px;
}

.table-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

th {
    background: #2c3e50;
    color: white;
}

tr:hover {
    background: #f1f1f1;
}
</style>

</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">

    <h1>Data Anggota</h1>

    <div class="table-container">
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>status</th>
            </tr>

            <?php 
            $no = 1;
            while($data = mysqli_fetch_assoc($query)) { 
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['status'] ?></td>
            </tr>
            <?php } ?>

        </table>
    </div>

</div>

</body>
</html>