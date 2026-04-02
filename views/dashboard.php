<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <div style="border: 2px solid green; padding: 30px;">
        <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Anda berada di arsitektur MVC.</p>
        <a href="index.php?action=logout" style="background: red; color: white; padding: 10px;">Logout</a>
    </div>
</body>
</html>