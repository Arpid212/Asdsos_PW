<?php
// Menggunakan path relatif untuk koneksi
include 'koneksi.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form dan menghilangkan spasi tambahan
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong!'); window.location.href='../register.php';</script>";
        exit();
    }

    // Cek apakah username sudah terdaftar
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Username sudah terdaftar!'); window.location.href='../register.php';</script>";
        exit();
    } else {
        // Hash password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // id_role default untuk "member" adalah 2
        $default_role_id = 2;

        // Menyimpan user baru ke database
        $stmt = $conn->prepare("INSERT INTO users (username, password, role_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $username, $hashed_password, $default_role_id);

        if ($stmt->execute()) {
            // Jika registrasi berhasil
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='../login.php';</script>";
        } else {
            // Jika registrasi gagal
            echo "<script>alert('Registrasi gagal! Silakan coba lagi.'); window.location.href='../register.php';</script>";
        }
    }

    $stmt->close();
} else {
    // Jika akses tidak valid
    echo "<script>alert('Akses tidak valid!'); window.location.href='../register.php';</script>";
}

$conn->close();
?>
