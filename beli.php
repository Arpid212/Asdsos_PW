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

    // Query untuk mendapatkan detail barang
    $sql = "SELECT * FROM barang WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $barang = $result->fetch_assoc();

        // Cek jika form checkout disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pembelian barang (update status dan hapus barang dari lelang)
            $conn->query("UPDATE barang SET status = 'dibeli' WHERE id = $id");
            
            // Optional: Hapus barang dari tabel lelang setelah pembelian
            // $conn->query("DELETE FROM barang WHERE id = $id");
            
            // Tampilkan pesan sukses pembelian
            echo "<p>Barang berhasil dibeli: " . htmlspecialchars($barang['nama_barang']) . "</p>";
            echo "<p>Proses checkout selesai. Terima kasih atas pembelian Anda.</p>";

            // Redirect ke halaman lelang setelah pembelian (agar tidak melakukan refresh berulang)
            header("Location: lelang.php");
            exit;
        }
    } else {
        echo "<p>Barang tidak ditemukan.</p>";
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
    <title>Checkout | Lelang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Detail Barang</h2>
        
        <?php if (isset($barang)): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($barang['gambar']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($barang['nama_barang']); ?>">
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
</html>
