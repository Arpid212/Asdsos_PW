<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <form action="http://localhost/Asdsos_PW/proses/tambah_barang_proses.php" method="POST">
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
        <textarea name="deskripsi" placeholder="Deskripsi" required></textarea>
        <input type="number" name="harga_awal" placeholder="Harga Awal" required>
        <input type="datetime-local" name="durasi_lelang" required>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>


