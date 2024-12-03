<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama_barang = $_POST['nama_barang'];
$deskripsi = $_POST['deskripsi'];
$harga_awal = $_POST['harga_awal'];
$durasi_lelang = $_POST['durasi_lelang'];

$query = "UPDATE barang SET 
            nama_barang='$nama_barang', 
            deskripsi='$deskripsi', 
            harga_awal='$harga_awal', 
            durasi_lelang='$durasi_lelang' 
          WHERE id='$id'";

if ($conn->query($query)) {
    header("Location: ../dashboard.php");
} else {
    echo "Gagal mengupdate barang!";
}
