<!DOCTYPE html>
<html>
<head>
    <title>Register - Tampilan</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 50px; }
        form { display: inline-block; border: 1px solid #ccc; padding: 20px; border-radius: 5px; }
        input { margin: 10px 0; padding: 8px; width: 200px; }
        button { padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Halaman Register</h2>
   
    <form method="POST" action="proses_register.php" onsubmit="return validasiRegister()">
        <input type="text" id="username" name="username" placeholder="Username"><br>
        <input type="password" id="password" name="password" placeholder="Password"><br>
        <button type="submit" name="submit_register">Daftar</button>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </form>


    <script src="assets/js/validasi.js"></script>
</body>
</html>