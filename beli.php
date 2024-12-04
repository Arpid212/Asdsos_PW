<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_lelang', 3308);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mulai session untuk mendapatkan user login
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Anda harus login terlebih dahulu.");
}
$id_user = $_SESSION['user_id'];

// Validasi ID barang
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID barang tidak valid.");
}
$id = intval($_GET['id']);

// Query untuk mendapatkan detail barang
$sql = "SELECT * FROM barang WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $barang = $result->fetch_assoc();

    // Periksa waktu terakhir dari penawaran atau gunakan waktu sistem
    $sql_last_time = "SELECT MAX(waktu_penawaran) AS waktu_terakhir FROM penawaran WHERE barang_id = $id";
    $result_last_time = $conn->query($sql_last_time);

    if ($result_last_time->num_rows > 0) {
        $row_last_time = $result_last_time->fetch_assoc();
        $current_time = $row_last_time['waktu_terakhir'] 
                        ? new DateTime($row_last_time['waktu_terakhir']) 
                        : new DateTime(); // Gunakan waktu sistem jika tidak ada penawaran
    } else {
        $current_time = new DateTime(); // Gunakan waktu sistem jika tidak ada hasil query
    }

    // Periksa apakah batas waktu lelang sudah terlewati
    $end_time = new DateTime($barang['durasi_lelang']); // Waktu lelang berakhir

    if ($current_time > $end_time) {
        // Jika batas waktu terlewati, ubah status barang menjadi 'terjual'
        if ($barang['status'] !== 'terjual') {
            $conn->query("UPDATE barang SET status = 'terjual' WHERE id = $id");
            $barang['status'] = 'terjual'; // Update status di variabel $barang
        }
    }

    // Query untuk mendapatkan penawaran terakhir
    $sql_bid = "SELECT * FROM penawaran WHERE barang_id = $id ORDER BY harga_penawaran DESC LIMIT 1";
    $result_bid = $conn->query($sql_bid);

    if ($result_bid->num_rows > 0) {
        $last_bid = $result_bid->fetch_assoc();
    } else {
        $last_bid = null; // Tidak ada penawaran
    }

    // Proses penawaran jika barang belum terjual
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $barang['status'] !== 'terjual') {
        $penawaran_harga = intval($_POST['harga_penawaran']);
        if ($penawaran_harga <= 0) {
            echo "<script>alert('Harga penawaran tidak valid.');</script>";
        } elseif ($last_bid && $last_bid['user_id'] == $id_user) {
            echo "<script>alert('Anda sudah melakukan bid terakhir. Tunggu bid dari pengguna lain.');</script>";
        } elseif ($penawaran_harga > ($last_bid['harga_penawaran'] ?? $barang['harga_awal'])) {
            $sql_insert = "INSERT INTO penawaran (barang_id, user_id, harga_penawaran, waktu_penawaran)
                           VALUES ($id, $id_user, $penawaran_harga, NOW())";
            if ($conn->query($sql_insert)) {
                echo "<script>alert('Bid berhasil!'); window.location.reload();</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Penawaran harus lebih tinggi dari harga terakhir.');</script>";
        }
    }
} else {
    die("<p>Barang tidak ditemukan atau tidak tersedia.</p>");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang | AuctionVault</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container mt-5">
    <h2>Detail Barang</h2>

    <?php if (isset($barang)): ?>
        <div class="card mb-4">
            <img src="assets/produk/<?php echo htmlspecialchars($barang['gambar']); ?>" 
                 class="card-img-top" 
                 alt="<?php echo htmlspecialchars($barang['nama_barang']); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($barang['nama_barang']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($barang['deskripsi']); ?></p>
                <p class="card-text">Harga Awal: Rp <?php echo number_format($barang['harga_awal'], 0, ',', '.'); ?></p>
                <p class="card-text">Batas Waktu: <?php echo $barang['durasi_lelang']; ?></p>
                <p class="card-text">Status: <?php echo ucfirst($barang['status']); ?></p>

                <?php if (isset($last_bid) && $last_bid): ?>
                    <p class="card-text">Penawaran Tertinggi: Rp <?php echo number_format($last_bid['harga_penawaran'], 0, ',', '.'); ?> oleh User ID: <?php echo $last_bid['user_id']; ?></p>
                    <p class="card-text">Waktu Penawaran Terakhir: <?php echo htmlspecialchars($last_bid['waktu_penawaran']); ?></p>
                <?php else: ?>
                    <p class="card-text">Belum ada penawaran.</p>
                <?php endif; ?>

                <?php if ($barang['status'] !== 'terjual'): ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="harga_penawaran" class="form-label">Harga Penawaran</label>
                            <input type="number" class="form-control" id="harga_penawaran" name="harga_penawaran" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Penawaran</button>
                    </form>
                <?php else: ?>
                    <p class="text-danger mt-3">Lelang telah berakhir, barang sudah terjual.</p>
                <?php endif; ?>

                <a href="http://localhost/Asdsos_PW/lelang.php" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    <?php endif; ?>
</div>

</body>

<footer class="custom-footer d-flex flex-column">
    <div class="footer-main d-flex container-lg">
        <div class="items"><img src="assets/auth/FTI.png" alt=""></div>
        <div class="items">
            <h4>Layanan</h4>
            <p>Daftar Barang Lelang</p>
            <p>Daftar Kelas Lelang</p>
            <p>Ijin Operasional Perlelangan</p>
            <p>Lowongan Kerja Part II</p>
            <p>Laporan Kinerja</p>
        </div>
        <div class="items">
            <h4>Hubungi Kami</h4>
            <p>Call Center 692-691</p>
            <p>Email: auction.care@uksw.edu</p>
            <p>Lokasi: Gedung FTI UKSW, Jl. Notohomidjodjo, Blotongan, Salatiga</p>
        </div>
    </div>
    <div class="copyright d-flex justify-content-start align-items-center">
        <p>© Pasteright 2024. Auction Vault, Universitas Kristen Satya Wacana.</p>
    </div>
</footer>

</html>
