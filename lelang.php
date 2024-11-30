<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | AuctionVault</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="valescaa.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_lelang', 3308);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data barang dari database
$sql = "SELECT * FROM barang ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | AuctionVault</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="valescaa.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container-md">
        <nav class="navbar navbar-expand-lg d-flex custom-navbar">
            <div class="brand">
                <img class="img-fluid" id="logo-collapse" src="http://localhost/Asdsos_PW/Documents/">
                Lelang
            </div>
            <div class="d-flex menu ms-auto align-items-center justify-content-between">
    <div class="menu-group d-flex align-items-center gap-4">
        <a href="http://localhost/Asdsos_PW/home.php" class="nav-link">Beranda</a>
        <div class="nav-item dropdown">
            <a href="http://localhost/Asdsos_PW/lelang.php" class="nav-link dropdown-toggle" id="dropdownMenuButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Lelang
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="http://localhost/Asdsos_PW/lelang.php">Beli</a></li>
                <li><a class="dropdown-item" href="http://localhost/Asdsos_PW/tambah_barang.php">Jual</a></li>
            </ul>
        </div>
        <a href="http://localhost/Asdsos_PW/.." class="nav-link">Pusat Bantuan</a>
    </div>
        <div class="button-group">
                    <a href="http://localhost/Asdsos_PW/login.php" class="btn" id="btn-1">Masuk</a>
                    <a href="http://localhost/Asdsos_PW/signup.php" class="btn" id="btn-2">Daftar</a>
        </div>
        </nav>

        <!-- Katalog -->
        <div class="main-lelang-1">
    <h2>Katalog Lot Lelang</h2>
    <div class="lelang-container d-flex flex-wrap">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Hitung waktu tersisa
                $waktuSekarang = new DateTime();
                $waktuAkhir = new DateTime($row['durasi_lelang']);
                $sisaWaktu = $waktuSekarang->diff($waktuAkhir);

                // Tentukan apakah lelang masih aktif
                $lelangAktif = $waktuAkhir > $waktuSekarang;

                echo '
                <div class="lelang-items container">
                    <div class="d-flex flex-column align-items-center">
                        <img class="img-lelang" src="' . htmlspecialchars($row['gambar']) . '" alt="' . htmlspecialchars($row['nama_barang']) . '">
                        <div class="judul-lelang d-flex align-items-center">
                            <h5>' . htmlspecialchars($row['nama_barang']) . '</h5>
                        </div>
                        <div class="deskripsi-lelang">
                            <p>' . htmlspecialchars($row['deskripsi']) . '</p>
                        </div>
                        <div class="harga-lelang">
                            <p>Harga Awal: Rp' . number_format($row['harga_awal'], 0, ',', '.') . '</p>
                        </div>
                        <div class="waktu-lelang">
                            <p>Waktu Tersisa: ' . ($lelangAktif ? $sisaWaktu->format('%d hari %h jam %i menit') : 'Lelang Selesai') . '</p>
                        </div>
                        ' . ($lelangAktif ? '<a href="beli.php?id=' . $row['id'] . '" class="btn btn-primary">Beli</a>' : '') . '
                    </div>
                </div>';
            }
        } else {
            echo '<p>Tidak ada barang lelang saat ini.</p>';
        }
        ?>
    </div>
</div>




    <footer class="custom-footer d-flex justify-content-center flex-column">
    </footer>

    </body>
</html>
<?php $conn->close(); ?>