<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Website Lelang</title>
    <link rel="stylesheet" href="http://localhost/Asdsos_PW/assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="container">
            <h1 class="logo">Lelang Online</h1>
            <nav>
                <a href="http://localhost/Asdsos_PW/login.php" class="btn btn-login">Login</a>
                <a href="http://localhost/Asdsos_PW/register.php" class="btn btn-register">Register</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="hero">
            <h2>Selamat Datang di Website Lelang Terbesar</h2>
            <p>Jual atau beli barang lelang dengan mudah, cepat, dan aman.</p>
            <a href="http://localhost/Asdsos_PW/register.php" class="btn btn-cta">Mulai Sekarang</a>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Lelang Online. All rights reserved.</p>
    </footer>
</body>
</html>
