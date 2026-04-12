<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id_anggota'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_anggota'];

$query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota = '$id_user'");
$user = mysqli_fetch_assoc($query);

if (isset($_POST['update_profil'])) {
    $nama_baru = mysqli_real_escape_string($koneksi, $_POST['nama']);
    
    $update = mysqli_query($koneksi, "UPDATE anggota SET nama = '$nama_baru' WHERE id_anggota = '$id_user'");
    if ($update) {
        $_SESSION['nama'] = $nama_baru;
        echo "<script>alert('Profil berhasil diperbarui!'); window.location='profil_siswa.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya - Perpustakaan Digital</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .content {
            margin-left: 240px;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .profile-card {
            background: white;
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .profile-header {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .avatar-circle {
            width: 100px;
            height: 100px;
            background: #ecf0f1;
            border-radius: 50%;
            border: 5px solid white;
            margin-bottom: -50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .profile-body {
            padding: 70px 30px 30px 30px;
            text-align: center;
        }

        .profile-body h2 {
            margin: 0;
            color: #2c3e50;
            font-size: 24px;
        }

        .profile-body p {
            color: #7f8c8d;
            margin: 5px 0 20px 0;
        }

        .info-grid {
            text-align: left;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-item label {
            display: block;
            font-size: 12px;
            color: #95a5a6;
            text-transform: uppercase;
            font-weight: bold;
        }

        .info-item span {
            font-size: 16px;
            color: #2c3e50;
            font-weight: 500;
        }

        .form-edit input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .btn-save {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-save:hover {
            background: #2980b9;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            background: #e1f5fe;
            color: #0288d1;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php include 'sidebar_siswa.php'; ?>

<div class="content">
    <div class="profile-card">
        <div class="profile-header">
            <div class="avatar-circle">
                👤
            </div>
        </div>

        <div class="profile-body">
            <h2><?= htmlspecialchars($user['nama']) ?></h2>
            <div class="status-badge"><?= $user['status'] ?></div>
            
            <p>ID Anggota: #<?= $user['id_anggota'] ?></p>

            <div class="info-grid">
                <div class="info-item">
                    <label>Username</label>
                    <span>@<?= htmlspecialchars($user['username']) ?></span>
                </div>
                
                <form action="" method="POST" class="form-edit">
                    <div class="info-item">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required>
                    </div>
                    <button type="submit" name="update_profil" class="btn-save">Simpan Perubahan</button>
                </form>
            </div>

            <small style="color: #bdc3c7;">Terdaftar sejak: Sistem Perpustakaan v1.0</small>
        </div>
    </div>
</div>

</body>
</html>