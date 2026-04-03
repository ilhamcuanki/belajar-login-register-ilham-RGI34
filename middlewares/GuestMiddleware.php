<?php
class GuestMiddleware {
    public static function handle() {
        // Jika sudah ada session login, paksa masuk ke dashboard
        if (isset($_SESSION['status_login'])) {
            header("Location: index.php?action=dashboard");
            exit;
        }
    }
}
?>