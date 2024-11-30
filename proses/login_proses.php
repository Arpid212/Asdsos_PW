<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong!'); window.location.href='../login.php';</script>";
        exit();
    }

    // Query untuk mendapatkan data user berdasarkan username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        echo "Error pada query: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Verifikasi password
        if (password_verify($password, $user['password_hash'])) {
            // Set data user ke dalam session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['id_role'] = $user['id_role'];

            // Redirect berdasarkan role (tanpa query JOIN)
            switch ($user['id_role']) {
                case 1: // Role admin
                    if ($username === 'admin') {
                        header("Location: ../dashboard.php");
                    } else {
                        echo "<script>alert('Akses ditolak!'); window.location.href='../login.php';</script>";
                    }
                    break;
                case 2: // Role member
                    header("Location: ../home.php");
                    break;
                default:
                    echo "<script>alert('Role tidak dikenali!'); window.location.href='../login.php';</script>";
                    break;
            }
        } else {
            echo "<script>alert('Password salah!'); window.location.href='../login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href='../login.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Akses tidak valid!'); window.location.href='../login.php';</script>";
}

$conn->close();
?>
