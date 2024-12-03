<?php
session_start();
include 'proses/koneksi.php';

$barang_id = $_GET['id'];
$query = "SELECT * FROM barang WHERE id = $barang_id";
$result = $conn->query($query);
$barang = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input,
        textarea,
        button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>

<body>
    <h1>Edit Barang Lelang</h1>
    <form action="http://localhost/Asdsos_PW/proses/edit_barang_proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $barang['id']; ?>">
        <input type="text" name="nama_barang" value="<?= $barang['nama_barang']; ?>" required>
        <textarea name="deskripsi"><?= $barang['deskripsi']; ?></textarea>
        <input type="number" name="harga_awal" value="<?= $barang['harga_awal']; ?>" required>
        <input type="datetime-local" name="durasi_lelang" value="<?= date('Y-m-d\TH:i', strtotime($barang['durasi_lelang'])); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>