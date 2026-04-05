<?php
// middlewares/LogMiddleware.php

class LogMiddleware {
    public static function handle() {
        // 1. Ambil Waktu Saat Ini
        // Set timezone ke Waktu Indonesia Barat (WIB)
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');
        
        // 2. Ambil IP Address Pengguna
        $ip_address = $_SERVER['REMOTE_ADDR'];
        
        // 3. Ambil Action (Halaman yang diakses)
        $action = isset($_GET['action']) ? $_GET['action'] : 'login';
        
        // 4. Cek Siapa yang Mengakses (Jika belum login, sebut 'Guest')
        $user = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

        // 5. Susun Format Pesan Log
        // \n digunakan untuk membuat baris baru (enter) di file teks
        $log_message = "[$waktu] IP: $ip_address | User: $user | Mengakses Halaman: $action\n";

        // 6. Simpan ke dalam file logs/app.log
        // FILE_APPEND memastikan teks ditambahkan ke bagian bawah file
        $file_path = __DIR__ . '/../logs/app.log';
        file_put_contents($file_path, $log_message, FILE_APPEND);
    }
}
?>