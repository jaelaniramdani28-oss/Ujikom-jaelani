<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Perpustakaan</title>

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

        .logo {
            width: 70px;
            margin-bottom: 10px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.2s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 5px rgba(37, 99, 235, 0.4);
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 16px;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background: #2563eb;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        .register-link {
            margin-top: 15px;
            font-size: 13px;
        }

        .register-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .footer-text {
            margin-top: 15px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="login-box">

    <img src="j.png" alt="Logo PBP" class="logo">

    <div class="title">Login</div>

    <form action="proses_login.php" method="POST" autocomplete="off">

        <div class="form-group">
            <input 
                type="text" 
                name="username" 
                placeholder="Username" 
                required
            >
        </div>

        <div class="form-group">
            <input 
                type="password" 
                name="password" 
                id="password"
                placeholder="Password" 
                required
            >
            <span class="toggle-password" onclick="togglePassword()">👁️</span>
        </div>

        <button type="submit" name="login" class="btn-login">
            Login
        </button>
        
        <div class="register-link">
         Belum punya akun? <a href="daftar.php">Daftar di sini</a>
        </div>

    </form>
    
    <div class="footer-text">
        © Sistem Perpustakaan
    </div>

</div>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.querySelector(".toggle-password");

    if (password.type === "password") {
        password.type = "text";
        icon.textContent = "🙈";
    } else {
        password.type = "password";
        icon.textContent = "👁️";
    }
}
</script>

</body>
</html>