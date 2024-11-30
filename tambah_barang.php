<?php
session_start(); // Memulai sesi untuk memeriksa login
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    // Jika pengguna sudah login, tampilkan pesan selamat datang
    echo "WELCOME, Member " . htmlspecialchars($_SESSION['username']);
} else {
    die("Anda harus login dan terverifikasi untuk mengakses halaman ini.");
}

// Koneksi ke database MySQL
$conn = new mysqli('localhost', 'root', '', 'db_lelang', 3308);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $conn->real_escape_string($_POST['nama_barang']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $harga_awal = floatval($_POST['harga_awal']);
    $durasi_lelang = $_POST['durasi_lelang'];
    $user_id = $_SESSION['user_id']; // Mengambil user_id dari sesi

    // Upload file gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "assets/produk/"; // Relatif ke folder tempat file PHP berada
        $target_file = $target_dir . basename($_FILES['gambar']['name']);

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            echo "Gambar berhasil diunggah.";

            // Menyimpan data ke dalam database
            $sql = "INSERT INTO barang (nama_barang, deskripsi, harga_awal, gambar, status, durasi_lelang, user_id, created_at)
                    VALUES ('$nama_barang', '$deskripsi', $harga_awal, '$target_file', 'pending', '$durasi_lelang', $user_id, NOW())";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Barang berhasil ditambahkan ke database!</p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        } else {
            echo "<p>Gagal mengunggah gambar.</p>";
        }
    } else {
        echo "<p>Harap pilih gambar untuk barang.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
    <h2>Tambah Barang Lelang</h2>
    <form action="tambah_barang.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nama_barang" placeholder="Nama Barang" required><br>
        <textarea name="deskripsi" placeholder="Deskripsi" required></textarea><br>
        <input type="number" name="harga_awal" placeholder="Harga Awal" step="0.01" required><br>
        <input type="file" name="gambar" accept="image/*" required><br>
        <input type="datetime-local" name="durasi_lelang" required><br>
        <button type="submit">Tambah</button>
    </form>

    <!-- Tombol untuk kembali ke halaman home.php -->
    <br>
    <a href="home.php">
        <button>Kembali ke Beranda</button>
    </a>
</body>
</html>

