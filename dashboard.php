<?php
session_start();
include 'proses/koneksi.php'; // Pastikan file koneksi database sudah benar

// Cek apakah user sudah login dan memiliki akses admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    echo "<script>alert('Akses ditolak! Anda tidak memiliki izin untuk mengakses halaman ini.'); window.location.href='../login.php';</script>";
    exit();
}

// Query untuk mendapatkan data barang
$query = "SELECT * FROM barang ORDER BY created_at DESC";
$result = $conn->query($query);

if (!$result) {
    die("Error pada query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="http://localhost/Asdsos_PW/assets/css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Dashboard Admin - Lelang Online</h1>
        <nav>
            <a href="http://localhost/Asdsos_PW/kelola_lelang.php">Kelola Lelang</a>
            <a href="http://localhost/Asdsos_PW/logout.php">Logout</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Berikut adalah daftar barang yang tersedia di sistem:</p>

        <!-- Daftar Barang -->
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga Awal</th>
                    <th>Durasi Lelang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                            <td>Rp <?= number_format($row['harga_awal'], 0, ',', '.'); ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($row['durasi_lelang'])); ?></td>
                            <td><?= ucfirst($row['status']); ?></td>
                            <td>
                                <a href="http://localhost/Asdsos_PW/detail_barang.php?id=<?= $row['id']; ?>" class="btn-detail">Detail</a>
                                <a href="http://localhost/Asdsos_PW/edit_barang.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                                <a href="http://localhost/Asdsos_PW/hapus_barang.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Tidak ada data barang yang tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Lelang Online. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>
