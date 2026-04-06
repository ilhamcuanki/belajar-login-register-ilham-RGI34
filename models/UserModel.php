<?php
require_once 'core/BaseModel.php';

class UserModel extends BaseModel {
    
    public function register($username, $password) {
        try {
            // 1. Enkripsi password menggunakan algoritma BCRYPT bawaan PHP
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = $this->pdo->prepare($query);
            
            // 2. Yang disimpan ke database adalah versi HASH, bukan aslinya
            return $stmt->execute([
                ':username' => $username,
                ':password' => $hashed_password // Simpan hasil enkripsi
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function authenticate($username, $password) {
        // 1. PERHATIAN: Di SQL, kita HANYA mencari berdasarkan username!
        // Jangan masukkan password di WHERE, karena password di DB sudah diacak.
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':username' => $username
        ]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // 2. Jika user ditemukan, verifikasi kecocokan password
        if ($user) {
            // Membandingkan password ketikan (plaintext) dengan password di database (hash)
            if (password_verify($password, $user['password'])) {
                return $user; // Password cocok, kembalikan data user
            }
        }
        
        // Jika username tidak ada ATAU password_verify gagal
        return false; 
    }
}
?>