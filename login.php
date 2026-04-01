<?php
session_start();
// Jika sudah login, cegah akses ke halaman ini
if (isset($_SESSION['status_login'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Tampilan</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 50px; }
        form { display: inline-block; border: 1px solid #ccc; padding: 20px; border-radius: 5px; background-color: #f9f9f9; }
        input { margin: 10px 0; padding: 8px; width: 200px; }
        button { padding: 10px 20px; cursor: pointer; }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Halaman Login</h2>


    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='error'>Username atau Password tidak cocok!</div>";
        }
    }
    ?>


    <form method="POST" action="proses_login.php" onsubmit="return validasiLogin()">
        <input type="text" id="username_login" name="username" placeholder="Username"><br>
        <input type="password" id="password_login" name="password" placeholder="Password"><br>
        <button type="submit" name="submit_login">Login</button>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </form>


    <script src="assets/js/validasi.js"></script>
</body>
</html>