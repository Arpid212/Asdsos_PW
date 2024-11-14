<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    // Redirect jika bukan admin
    header("Location: ../index.php");
    exit();
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
            <?php if ($role == 'admin'): ?>
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
