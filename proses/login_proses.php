<?php
include 'koneksi.php';  // Gunakan path relatif karena login_proses.php dan koneksi.php berada di dalam folder yang sama
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form dan menghilangkan spasi tambahan
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input untuk memastikan tidak kosong
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong!'); window.location.href='../login.php';</script>";
        exit();
    }

    // Menggunakan prepared statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        // Jika query gagal
        echo "<script>alert('Database query error.'); window.location.href='../login.php';</script>";
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {
        // Debugging: Cetak nilai role
        echo "Role: " . $user['role'];  // Untuk memastikan role terbaca
   
        // Menyimpan data user ke dalam session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
   
        // Redirect berdasarkan role
        if (strtolower($user['role']) === 'admin') {
            // Redirect ke dashboard untuk admin
            header("Location: ../dashboard.php"); 
            exit();
        } else {
            // Redirect ke homepage untuk user biasa
            header("Location: ../index.php"); 
            exit();
        }
    } else {
        // Jika login gagal
        echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href='../login.php';</script>";
    }
}
$conn->close();
?>
