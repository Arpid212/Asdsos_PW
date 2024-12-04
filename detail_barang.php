<?php
session_start();
include 'proses/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$barang_id = $_GET['id'];
$query = "SELECT * FROM barang WHERE id = $barang_id";
$result = $conn->query($query);
$barang = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4faff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 1rem 2rem;
            text-align: center;
        }

        main {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .content {
            padding: 1.5rem 2rem;
        }

        .content p {
            margin: 0.5rem 0;
            font-size: 1rem;
        }

        .content p span {
            font-weight: bold;
            color: #007bff;
        }

        .back-link {
            display: inline-block;
            margin: 1rem;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .back-link:hover {
            background-color: #0056b3;
        }

        footer {
            text-align: center;
            padding: 1rem 0;
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Detail Barang Lelang</h1>
    </header>

    <main>
        <div class="content">
            <p><span>Nama:</span> <?= htmlspecialchars($barang['nama_barang']); ?></p>
            <p><span>Deskripsi:</span> <?= htmlspecialchars($barang['deskripsi']); ?></p>
            <p><span>Harga Awal:</span> Rp <?= number_format($barang['harga_awal'], 2, ',', '.'); ?></p>
            <p><span>Durasi Lelang:</span> <?= htmlspecialchars($barang['durasi_lelang']); ?></p>
            <p><span>Status:</span> <?= htmlspecialchars($barang['status']); ?></p>
        </div>
        <a href="http://localhost/Asdsos_PW/dashboard.php" class="back-link">Kembali ke Dashboard</a>
    </main>

    <footer>
        &copy; 2024 Sistem Lelang
    </footer>
</body>
</html>
