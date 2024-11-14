<?php
session_start();
include 'proses/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit();
}

$query = "SELECT * FROM barang";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Lelang</title>
</head>
<body>
    <h1>Kelola Lelang</h1>
    <a href="http://localhost/Asdsos_PW/tambah_barang.php">Tambah Barang</a>
    <table border="1">
        <tr>
            <th>Nama Barang</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['status']; ?></td>
            <td>
                <a href="http://localhost/Asdsos_PW/edit_barang.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="http://localhost/Asdsos_PW/proses/hapus_barang_proses.php?id=<?= $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
