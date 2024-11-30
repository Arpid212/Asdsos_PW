<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lelang";
$port = 3308; // Port MySQL Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start();
if (!isset($_SESSION['username']) || $_SESSION['role_id'] != 1) {
    header("Location: http://localhost/Asdsos_PW/login.php");
    exit();
}

// Query untuk mendapatkan daftar barang
$query = "SELECT * FROM barang";
$result = $conn->query($query);
if (!$result) {
    die("Error pada query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Lelang</title>
    <link rel="stylesheet" href="http://localhost/Asdsos_PW/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Selamat Datang di Lelang Online</h1>
        <nav>
            <?php if ($_SESSION['role_id'] == 1): ?>
                <a href="http://localhost/Asdsos_PW/kelola_lelang.php">Kelola Lelang</a>
            <?php endif; ?>
            <a href="http://localhost/Asdsos_PW/logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <h2>Daftar Barang Lelang</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Awal</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                    <td>Rp <?= number_format($row['harga_awal'], 0, ',', '.'); ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row['durasi_lelang'])); ?></td>
                    <td><a href="http://localhost/Asdsos_PW/detail_barang.php?id=<?= $row['id']; ?>" class="btn-detail">Detail</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Lelang Online. All rights reserved.</p>
    </footer>
</body>
</html>
