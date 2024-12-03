<?php
include 'koneksi.php'; // Pastikan koneksi database disertakan

// Ambil data dari form
$nama_barang = $_POST['nama_barang'];
$deskripsi = $_POST['deskripsi'];
$harga_awal = $_POST['harga_awal'];
$durasi_lelang = $_POST['durasi_lelang'];

// Proses upload file
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "../assets/produk/"; // Folder lokal tempat menyimpan file
    $target_file = $target_dir . basename($_FILES['foto']['name']);
    
    // Validasi file gambar (opsional)
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif']; // Format file yang diizinkan
    if (!in_array($file_type, $allowed_types)) {
        die("Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.");
    }

    // Pindahkan file yang diunggah ke folder target
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        // Berhasil upload
        $gambar = basename($_FILES['foto']['name']); // Simpan nama file saja di database
    } else {
        die("Gagal mengupload gambar.");
    }
} else {
    die("Tidak ada gambar yang diunggah.");
}

// Simpan user_id jika ada session login
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    die("Anda harus login terlebih dahulu.");
}

// Buat query untuk menyimpan data
$sql = "INSERT INTO barang (nama_barang, deskripsi, harga_awal, gambar, status, durasi_lelang, user_id, created_at)
        VALUES ('$nama_barang', '$deskripsi', $harga_awal, '$gambar', 'pending', '$durasi_lelang', $user_id, NOW())";

// Eksekusi query
if ($conn->query($sql)) {
    echo "Berhasil menambahkan barang! Menunggu verifikasi admin.";
    header("Location: ../ajuan.php");
    exit;
} else {
    echo "Gagal menambahkan barang: " . $conn->error;
}
?>
