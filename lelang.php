<?php
session_start();

if (isset($_SESSION['username'])) {

} else {
            echo "<script>
            alert('Anda harus login terlebih dahulu untuk mengajukan lelang.');
            window.location.href = 'http://localhost/Asdsos_PW/login.php';
            </script>";
            exit; // Hentikan eksekusi script lebih lanjut
        }

include 'proses/koneksi.php'; // Pastikan koneksi database di-load

// Ambil data barang dari database
$sql = "SELECT * FROM barang WHERE status = 'terverifikasi'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | AuctionVault</title>
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/Asdsos_PW/style.css">
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    /* Atur ukuran logo */
.brand img {
    max-height: 50px; /* Sesuaikan dengan ukuran yang diinginkan */
    width: auto; /* Otomatis sesuaikan lebar dengan proporsi */
    margin-right: 10px; /* Tambahkan jarak dengan teks "Lelang" jika perlu */
    display: inline-block;
    vertical-align: middle; /* Sejajarkan dengan teks */
}

/* Tambahkan style untuk brand */
.brand {
    display: flex;
    align-items: center;
    font-size: 1.5rem; /* Ukuran teks di sebelah logo */
    font-weight: bold;
    color: #000; /* Warna teks */
}

</style>
</head>




<body>
    <div class="container-md">
        <nav class="navbar navbar-expand-lg d-flex custom-navbar">
            <div class="brand">
                <img class="img-fluid" id="logo-collapse" src="assets/auth/lelang.png" alt="Logo">
                Lelang
            </div>
            <div class="d-flex menu ms-auto align-items-center">
                <div class="menu-group">
                    <a href="http://localhost/Asdsos_PW/home.php">Beranda</a>
                    <a href="http://localhost/Asdsos_PW/lelang.php">Lelang</a>
                    <a href=""></a>
                </div>

                <div class="welcome-message">
                    <?php if (isset($_SESSION['username'])): ?>
                        <!-- Jika pengguna sudah login -->
                        <span class="welcome-text"><?php echo htmlspecialchars($_SESSION['username']);?></span>
                    <?php else: ?>

                    <?php endif; ?>
                </div>

                <div class="button-group">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Jika pengguna sudah login -->
                        <a href="http://localhost/Asdsos_PW/logout.php" class="btn" id="btn-1">Keluar</a>
                    <?php else: ?>
                        <!-- Jika pengguna belum login -->
                        <a href="http://localhost/Asdsos_PW/login.php" class="btn" id="btn-1">Masuk</a>
                    <?php endif; ?>
                    <a href="http://localhost/Asdsos_PW/signup.php" class="btn" id="btn-2">Daftar</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="main-lelang-ajuan d-flex justify-content-center">
        <div class="container d-flex flex-column align-items-center">
            <h1>Anda ingin mengajukan lelang ke Auction Vault?</h1>
            <p>Daftarkan sekarang juga barang yang ingin anda lelangkan!</p>
            <a href="http://localhost/Asdsos_PW/ajuan.php" class="btn" id="btn-dftl">Daftar Sekarang!</a>
        </div>
    </div>

    <!-- Katalog -->
    <div class="button-group">
        <h2>Katalog Lot Lelang</h2>
    </div>
       <?php
        if ($result->num_rows > 0): ?>
            <div class="container-md">
                <div class="main-lelang-1">
                    <div class="lelang-container d-flex flex-wrap">
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <div class="card m-2" style="width: 18rem;">
                                <img src="http://localhost/Asdsos_PW/assets/produk/<?= htmlspecialchars($row['gambar']); ?>" class="card-img-top"
                                    alt="<?= htmlspecialchars($row['nama_barang']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row['nama_barang']); ?></h5>
                                    <p class="card-text">Harga Awal: Rp <?= number_format($row['harga_awal'], 0, ',', '.'); ?></p>
                                    <p class="card-text">Durasi: <?= date('d-m-Y H:i', strtotime($row['durasi_lelang'])); ?></p>
                                    <a href="beli.php?id=<?= $row['id']; ?>" class="btn btn-primary">Beli</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="container-md">
                <p class="text-center">Tidak ada barang yang tersedia untuk dilelang.</p>
            </div>
        <?php endif; ?>
                        

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
