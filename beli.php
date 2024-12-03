<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_lelang', 3308);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ID barang ada dalam URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ambil ID barang dari URL

    // Query untuk mendapatkan detail barang dengan status terverifikasi
    $sql = "SELECT * FROM barang WHERE id = $id AND status = 'terverifikasi'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $barang = $result->fetch_assoc();

        // Cek jika form checkout disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Update status barang menjadi 'terjual'
            $conn->query("UPDATE barang SET status = 'terjual' WHERE id = $id");

            // Tampilkan pesan sukses pembelian
            echo "<script>alert('Barang berhasil dibeli: " . htmlspecialchars($barang['nama_barang']) . "'); window.location.href='home.php';</script>";
            exit;
        }
    } else {
        echo "<p>Barang tidak ditemukan atau sudah tidak tersedia.</p>";
    }
} else {
    echo "<p>ID barang tidak valid.</p>";
}

$conn->close();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/Asdsos_PW/style.css">
</head>

<body>
    <div class="container">
        <h2>Detail Barang</h2>
        
        <?php if (isset($barang)): ?>
            <div class="card">
                <!-- Perbaikan jalur gambar -->
                <img src="assets/produk/<?php echo htmlspecialchars($barang['gambar']); ?>" 
                     class="card-img-top" 
                     alt="<?php echo htmlspecialchars($barang['nama_barang']); ?>">
                     
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($barang['nama_barang']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($barang['deskripsi']); ?></p>
                    <p class="card-text">Harga Awal: Rp <?php echo number_format($barang['harga_awal'], 0, ',', '.'); ?></p>
                    <form method="POST">
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

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
</html>
