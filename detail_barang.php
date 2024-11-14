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
    <title>Detail Barang</title>
</head>
<body>
    <h1>Detail Barang Lelang</h1>
    <p>Nama: <?= $barang['nama_barang']; ?></p>
    <p>Deskripsi: <?= $barang['deskripsi']; ?></p>
    <p>Harga Awal: Rp <?= number_format($barang['harga_awal'], 2, ',', '.'); ?></p>
    <p>Durasi Lelang: <?= $barang['durasi_lelang']; ?></p>
    <p>Status: <?= $barang['status']; ?></p>

    <?php if ($_SESSION['role'] == 'user' && $barang['status'] == 'terverifikasi'): ?>
        <form action="http://localhost/Asdsos_PW/proses/tawar_barang_proses.php" method="POST">
            <input type="hidden" name="barang_id" value="<?= $barang['id']; ?>">
            <input type="number" name="harga_penawaran" placeholder="Masukkan harga penawaran" required>
            <button type="submit">Ajukan Penawaran</button>
        </form>
    <?php endif; ?>

    <a href="http://localhost/Asdsos_PW/dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
