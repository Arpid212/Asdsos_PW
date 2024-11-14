<?php
include 'koneksi.php';

$nama_barang = $_POST['nama_barang'];
$deskripsi = $_POST['deskripsi'];
$harga_awal = $_POST['harga_awal'];
$durasi_lelang = $_POST['durasi_lelang'];

$query = "INSERT INTO barang (nama_barang, deskripsi, harga_awal, durasi_lelang, status) 
          VALUES ('$nama_barang', '$deskripsi', '$harga_awal', '$durasi_lelang', 'pending')";

if ($conn->query($query)) {
    header("Location: kelola_lelang.php");
} else {
    echo "Gagal menambahkan barang!";
}
?>
