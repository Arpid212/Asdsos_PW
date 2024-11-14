<?php
include 'koneksi.php';
session_start();

$user_id = $_SESSION['user_id'];
$barang_id = $_POST['barang_id'];
$harga_penawaran = $_POST['harga_penawaran'];

$query = "INSERT INTO penawaran (barang_id, user_id, harga_penawaran) 
          VALUES ('$barang_id', '$user_id', '$harga_penawaran')";

if ($conn->query($query)) {
    header("Location: detail_barang.php?id=$barang_id");
} else {
    echo "Gagal mengajukan penawaran!";
}
?>
