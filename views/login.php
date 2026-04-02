<!DOCTYPE html>
<html>
<head>
    <title>Login - MVC</title>
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
    <?php if (isset($pesan_error)) { echo "<p style='color:red;'>$pesan_error</p>"; } ?>
   
    <form method="POST" action="index.php?action=login" onsubmit="return validasiLogin()">
        <input type="text" id="username_login" name="username" placeholder="Username"><br>
        <input type="password" id="password_login" name="password" placeholder="Password"><br>
        <button type="submit">Login</button>
        <p>Belum punya akun? <a href="index.php?action=register">Daftar</a></p>
    </form>
    <script src="assets/js/validasi.js"></script>
</body>
</html>