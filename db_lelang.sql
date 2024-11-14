CREATE DATABASE IF NOT EXISTS db_lelang;
USE db_lelang;

-- Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Barang Lelang
CREATE TABLE barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    harga_awal DECIMAL(10, 2) NOT NULL,
    gambar VARCHAR(100),
    status ENUM('pending', 'terverifikasi', 'terjual') DEFAULT 'pending',
    durasi_lelang DATETIME,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tabel Penawaran
CREATE TABLE penawaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    barang_id INT,
    user_id INT,
    harga_penawaran DECIMAL(10, 2),
    waktu_penawaran TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (barang_id) REFERENCES barang(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
