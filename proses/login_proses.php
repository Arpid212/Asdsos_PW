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

    $stmt = $conn->prepare("SELECT users.id, users.username, users.password, users.role_id, role.role_name 
                            FROM users 
                            JOIN role ON users.role_id = role.role_id
                            WHERE users.username = ?");
    if (!$stmt) {
        echo "Error pada query: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['username'] = $user['username'];

        if ($user['role_id'] == 1) { 
            header("Location: ../dashboard.php");
            exit();
        } elseif ($user['role_id'] == 2) {
            header("Location: ../home.php");
            exit();
        } else {
            echo "<script>alert('Role tidak dikenali!'); window.location.href='../login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href='../login.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Akses tidak valid!'); window.location.href='../login.php';</script>";
}

$conn->close();
?>
