<?php
// models/UserModel.php
require_once 'config/database.php';


function registerUser($username, $password) {
    $pdo = getDBConnection();
    try {
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($query);
        return $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
    } catch (PDOException $e) {
        return false; // Gagal (misal username sudah ada)
    }
}


function authenticateUser($username, $password) {
    $pdo = getDBConnection();
    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan array jika cocok, false jika salah
}
?>
