<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        
        $_SESSION['username']   = $data['username'];
        $_SESSION['nama']       = $data['nama'];
        $_SESSION['status']     = $data['status'];
        $_SESSION['id_anggota'] = $data['id_anggota'];

        $status_user = strtolower($data['status']);

        if ($status_user == "admin") {
            header("Location: dashboard.php");
            exit;
        } else if ($status_user == "siswa") {
            header("Location: dashboard_siswa.php");
            exit;
        } else {
            echo "<script>alert('Status akun tidak dikenali: " . $data['status'] . "'); window.location='login.php';</script>";
        }

    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='login.php';</script>";
    }
}