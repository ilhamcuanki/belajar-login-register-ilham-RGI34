CREATE DATABASE IF NOT EXISTS db_belajar;
USE db_belajar;


CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);


-- Pastikan sudah memilih database 'db_belajar'
USE db_belajar;


-- Masukkan 10 data pengguna sebagai percobaan
INSERT INTO users (username, password) VALUES
('dosen_budi', 'admin123'),
('mahasiswa_01', 'mhs111'),
('mahasiswa_02', 'mhs222'),
('mahasiswa_03', 'mhs333'),
('andi_kurniawan', 'andi2026'),
('siti_aminah', 'siti2026'),
('bima_sakti', 'rahasia1'),
('citra_dewi', 'rahasia2'),
('eko_patrio', 'qwerty'),
('admin_kampus', 'kampusku');