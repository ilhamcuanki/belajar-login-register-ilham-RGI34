<?php
class AuthMiddleware {
    public static function handle() {
        // Jika tidak ada session login, tendang ke halaman login
        if (!isset($_SESSION['status_login'])) {
            header("Location: index.php?action=login");
            exit;
        }
    }
}
?>