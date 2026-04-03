<?php
require_once 'core/BaseModel.php';

class UserModel extends BaseModel {
    
    public function register($username, $password) {
        try {
            $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
            // Menggunakan $this->pdo warisan dari BaseModel
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([
                ':username' => $username,
                ':password' => $password
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function authenticate($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>