<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM barang WHERE id = $id";

if ($conn->query($query)) {
    header("Location: ../dashboard.php");
} else {
    echo "Gagal menghapus barang!";
}
