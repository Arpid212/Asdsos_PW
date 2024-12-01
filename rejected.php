<?php
session_start();
include 'proses/koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    die("Akses ditolak!");
}

$id = intval($_GET['id']);
$sql = "UPDATE barang SET status='tolak' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Barang berhasil ditolak.'); window.location.href='dashboard.php';</script>";
} else {
    echo "<script>alert('Gagal menolak barang: " . $conn->error . "'); window.location.href='dashboard.php';</script>";
}
$conn->close();
?>
