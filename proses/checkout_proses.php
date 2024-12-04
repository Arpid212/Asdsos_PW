<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_lelang', 3308);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mulai session
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Anda harus login terlebih dahulu.");
}
$id_user = $_SESSION['user_id'];

// Cek apakah ID barang ada dalam URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query barang dan batas waktu
    $sql = "SELECT * FROM barang WHERE id = $id AND status = 'terverifikasi'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $barang = $result->fetch_assoc();
        $batas_waktu = $barang['durasi_lelang'];

        // Validasi waktu lelang
        if (new DateTime() > new DateTime($batas_waktu)) {
            echo "<p>Lelang sudah berakhir.</p>";
            exit;
        }

        // Ambil data penawaran terakhir
        $sql_bid = "SELECT * FROM penawaran WHERE barang_id = $id ORDER BY penawaran_harga DESC LIMIT 1";
        $last_bid = $conn->query($sql_bid)->fetch_assoc();

        // Proses penawaran baru
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $penawaran_harga = intval($_POST['penawaran_harga']);

            if ($penawaran_harga <= 0) {
                echo "<script>alert('Harga penawaran tidak valid.');</script>";
            } elseif ($last_bid && $last_bid['user_id'] == $id_user) {
                echo "<script>alert('Anda sudah melakukan bid terakhir. Tunggu bid dari pengguna lain.');</script>";
            } elseif ($penawaran_harga > ($last_bid['penawaran_harga'] ?? $barang['harga_awal'])) {
                $sql_insert = "INSERT INTO penawaran (barang_id, user_id, penawaran_harga, waktu_penawaran)
                               VALUES ($id, $id_user, $penawaran_harga, NOW())";
                if ($conn->query($sql_insert)) {
                    echo "<script>alert('Bid berhasil!');</script>";
                } else {
                    echo "<script>alert('Terjadi kesalahan: " . $conn->error . "');</script>";
                }
            } else {
                echo "<script>alert('Penawaran harus lebih tinggi dari harga terakhir.');</script>";
            }
        }
    } else {
        echo "<p>Barang tidak ditemukan atau sudah tidak tersedia.</p>";
    }
} else {
    echo "<p>ID barang tidak valid.</p>";
}

$conn->close();
?>
