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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f4faff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        .container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
        }

        h1 {
            color: #0066cc;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input,
        textarea,
        button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #0066cc;
            box-shadow: 0px 0px 5px rgba(0, 102, 204, 0.5);
        }

        textarea {
            resize: none;
        }

        button {
            background-color: #0066cc;
            color: white;
            border: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #005bb5;
        }

        /* Tombol Kembali ke Dashboard */
        .back-to-dashboard {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #0066cc;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-to-dashboard:hover {
            background-color: #005bb5;
        }
    </style>
</head>

<body>
    <!-- Tombol Kembali -->
    <a href="http://localhost/Asdsos_PW/dashboard.php" class="back-to-dashboard">Kembali ke Dashboard</a>

    <div class="container">
        <h1>Edit Barang</h1>
        <form action="http://localhost/Asdsos_PW/proses/edit_barang_proses.php" method="POST">
            <input type="hidden" name="id" value="<?= $barang['id']; ?>">
            <div class="mb-3">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required><?= $barang['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="harga_awal">Harga Awal</label>
                <input type="number" id="harga_awal" name="harga_awal" value="<?= $barang['harga_awal']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="durasi_lelang">Durasi Lelang</label>
                <input type="datetime-local" id="durasi_lelang" name="durasi_lelang" 
                       value="<?= date('Y-m-d\TH:i', strtotime($barang['durasi_lelang'])); ?>" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>
