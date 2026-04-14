<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Perpustakaan</title>
    <style>
        * { 
        margin: 0; 
        padding: 0; 
        box-sizing: border-box; 
        font-family: 'Segoe UI', Arial, sans-serif; 
        }
        
        body { 
        background: linear-gradient(135deg, #1e293b, #2563eb); 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        height: 100vh; 
        }
        
        .login-box { 
        background: #fff; 
        padding: 30px 25px; 
        width: 340px; 
        border-radius: 12px; 
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25); 
        text-align: center; 
        }
        
        .title { 
        font-size: 22px; 
        font-weight: bold; 
        color: #1e293b; 
        margin-bottom: 20px; 
        }
        
        .form-group { 
        margin-bottom: 15px; 
        }
        
        .form-group input { 
        width: 100%; 
        padding: 10px 12px; 
        border: 1px 
        solid #ccc; 
        border-radius: 6px; 
        font-size: 14px; 
        }
 
        .btn-daftar { 
        width: 100%; 
        padding: 10px; 
        background: #10b981; 
        border: none; 
        border-radius: 6px; 
        color: #fff; 
        font-weight: bold; 
        cursor: pointer; 
        transition: 0.3s; 
        }
        
        .btn-daftar:hover { 
        background: #059669; 
        }
        
        .link { 
        margin-top: 15px; 
        font-size: 13px; 
        }
        
        .link a { 
        color: #2563eb; 
        text-decoration: none; 
        font-weight: bold; 
        }
        
    </style>
</head>
<body>

<div class="login-box">
    <div class="title">Daftar akun Baru</div>
    
    <form action="proses_daftar.php" method="POST">
        <div class="form-group">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        
        <button type="submit" name="daftar" class="btn-daftar">Daftar Sekarang</button>
    </form>

    <div class="link">
        Sudah punya akun? <a href="login.php">Login</a>
    </div>
</div>

</body>
</html>
