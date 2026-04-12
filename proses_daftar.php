<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];
    $status   = 'Siswa';

    $cek_user = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username = '$username'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>
                alert('Username sudah digunakan! Gunakan username lain.');
                window.location = 'daftar.php';
              </script>";
    } else {
        $query = "INSERT INTO anggota (nama, username, password, status) 
                  VALUES ('$nama', '$username', '$password', '$status')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>
                    alert('Pendaftaran Berhasil! Silakan Login.');
                    window.location = 'login.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
} else {
    header("Location: daftar.php");
}
?>