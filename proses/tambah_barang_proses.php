<?php
include 'koneksi.php'; // Pastikan koneksi database disertakan

// Mulai session untuk menangkap user_id
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Anda harus login terlebih dahulu.");
}
$user_id = $_SESSION['user_id'];

// Ambil data dari form
$nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
$deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
$harga_awal = floatval($_POST['harga_awal']);
$durasi_lelang = mysqli_real_escape_string($conn, $_POST['durasi_lelang']);

// Proses upload file
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "../assets/produk/"; // Folder lokal tempat menyimpan file
    $target_file = $target_dir . basename($_FILES['foto']['name']);

    // Validasi file gambar
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($file_type, $allowed_types)) {
        die("Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.");
    }

    // Pindahkan file yang diunggah ke folder target
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $gambar = basename($_FILES['foto']['name']); // Simpan nama file saja di database
    } else {
        die("Gagal mengupload gambar.");
    }
} else {
    die("Tidak ada gambar yang diunggah.");
}

// Buat query untuk menyimpan data ke tabel barang
$sql_barang = "INSERT INTO barang (nama_barang, deskripsi, harga_awal, gambar, status, durasi_lelang, user_id, created_at)
               VALUES ('$nama_barang', '$deskripsi', $harga_awal, '$gambar', 'pending', '$durasi_lelang', $user_id, NOW())";

// Eksekusi query untuk tabel barang
if ($conn->query($sql_barang)) {
    // Ambil ID barang yang baru saja disimpan
    $barang_id = $conn->insert_id;

    // Buat query untuk menyimpan data awal ke tabel penawaran (opsional jika ingin otomatis)
    $sql_penawaran = "INSERT INTO penawaran (barang_id, user_id, harga_penawaran, waktu_penawaran)
                      VALUES ($barang_id, $user_id, $harga_awal, NOW())";

    // Eksekusi query untuk tabel penawaran
    if ($conn->query($sql_penawaran)) {
        echo "Berhasil menambahkan barang dan penawaran awal! Menunggu verifikasi admin.";
        header("Location: ../ajuan.php");
        exit;
    } else {
        echo "Barang berhasil disimpan, tetapi gagal menyimpan data ke tabel penawaran: " . $conn->error;
    }
} else {
    echo "Gagal menambahkan barang: " . $conn->error;
}
?>
