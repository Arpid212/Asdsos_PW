<?php
session_start();
include 'proses/koneksi.php';

$barang_id = $_GET['id'];
$query = "SELECT * FROM barang WHERE id = $barang_id";
$result = $conn->query($query);
$barang = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Barang Lelang</h1>
    <form action="http://localhost/Asdsos_PW/proses/edit_barang_proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $barang['id']; ?>">
        <input type="text" name="nama_barang" value="<?= $barang['nama_barang']; ?>" required>
        <textarea name="deskripsi"><?= $barang['deskripsi']; ?></textarea>
        <input type="number" name="harga_awal" value="<?= $barang['harga_awal']; ?>" required>
        <input type="datetime-local" name="durasi_lelang" value="<?= date('Y-m-d\TH:i', strtotime($barang['durasi_lelang'])); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
