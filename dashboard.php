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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="valescaa.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/Asdsos_PW/style.css">
    <style>
        /* Gaya untuk tema biru dan putih */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f9ff;
            /* Warna putih kebiruan */
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            /* Warna biru */
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            padding: 20px;
        }

        main h2 {
            color: #007bff;
            /* Warna biru */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            /* Warna biru */
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e9f3ff;
            /* Warna biru muda */
        }

        .btn-detail,
        .btn-edit,
        .btn-delete,
        .btn-approve,
        .btn-reject {
            text-decoration: none;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            margin-right: 5px;
        }

        .btn-detail {
            background-color: #007bff;
            /* Warna biru */
        }

        .btn-edit {
            background-color: #ffc107;
            /* Warna kuning */
        }

        .btn-delete {
            background-color: #dc3545;
            /* Warna merah */
        }

        .btn-approve {
            background-color: #28a745;
            /* Warna hijau */
        }

        .btn-reject {
            background-color: #6c757d;
            /* Warna abu-abu */
        }

        footer {
            background-color: #007bff;
            /* Warna biru */
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }
    </style>
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
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Awal</th>
                    <th>Durasi Lelang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php $no = 1; // Inisialisasi nomor urut
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="border px-4 py-3 text-gray-700"><?= $no++ ?> </td>
                            <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                            <td>Rp <?= number_format($row['harga_awal'], 0, ',', '.'); ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($row['durasi_lelang'])); ?></td>
                            <td><?= ucfirst($row['status']); ?></td>
                            <td>
                                <a href="http://localhost/Asdsos_PW/detail_barang.php?id=<?= $row['id']; ?>" class="btn-detail">Detail</a>
                                <a href="http://localhost/Asdsos_PW/edit_barang.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                                <a href="http://localhost/Asdsos_PW/proses/hapus_barang_proses.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</a>
                                <a href="approved.php?id=<?= $row['id']; ?>" class="btn-approve" onclick="return confirm('Setujui barang ini?');">Approve</a>
                                <a href="rejected.php?id=<?= $row['id']; ?>" class="btn-reject" onclick="return confirm('Tolak barang ini?');">Reject</a>
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
    <footer class="custom-footer d-flex flex-column">
        <div class="footer-main d-flex container-lg">
            <div class="items"><img src="assets/auth/FTI.png" alt="">
            </div>
            <div class="items">
                <h4>Layanan</h4>
                <p>Daftar Barang Lelang</p>
                <p>Daftar Kelas Lelang</p>
                <p>Ijin Operasional Perlelangan</p>
                <p>Lowongan Kerja Part II</p>
                <p>Laporan Kinerja</p>
                <p>Ijin Pindah Wilayah Jabatan</p>
                <p>Ijin Bolos Kuliah</p>
            </div>
            <div class="items">
                <h4>Hubungi Kami</h4>
                <div class="contact">
                    <div class="img">
                        <img src="assets/footer/call.png">
                    </div>
                    <p>Call Center 692-691</p>
                </div>
                <div class="contact">
                    <div class="img">
                        <img src="assets/footer/email.png">
                    </div>
                    <p>auction.care@uksw.edu</p>
                </div>
                <div class="contact">
                    <div class="img">
                        <img src="assets/footer/facebook.png">
                    </div>
                    <p>Auction Vault</p>
                </div>
                <div class="contact">
                    <div class="img">
                        <img src="assets/footer/lokasi.png">
                    </div>
                    <p>Gedung FTI UKSW, Jl. Notohomidjodjo, Blotongan, Salatiga</p>
                </div>
            </div>
        </div>
        <div class="copyright d-flex justify-content-start align-items-center">
            <p>© Pasteright 2024. Auction Vault, Universitas Kristen Satya Wacana.</p>
        </div>
    </footer>
</body>

</html>


<?php
// Tutup koneksi database
$conn->close();
?>