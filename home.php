<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    // Jika pengguna sudah login, tampilkan pesan selamat datang
    echo "WELLCOME, Member " . htmlspecialchars($_SESSION['username']);
} else {

}
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
    <link rel="stylesheet" href="http://localhost/Asdsos_PW/style.css">
</head>

<body>
    <div class="container-md">
        <nav class="navbar navbar-expand-lg d-flex custom-navbar">
            <div class="brand">
                <img class="img-fluid" id="logo-collapse" src="http://localhost/Asdsos_PW/Documents/">
                Lelang
            </div>
            <div class="d-flex menu ms-auto align-items-center">
                <div class="menu-group">
                    <a href="http://localhost/Asdsos_PW/home.php">Beranda</a>
                    <a href="http://localhost/Asdsos_PW/lelang.php">Lelang</a>
                    <a href="">Pusat Bantuan</a>
                    <a href=""></a>
                </div>
                <div class="button-group">
                    <a href="http://localhost/Asdsos_PW/login.php" class="btn" id="btn-1">Masuk</a>
                    <a href="http://localhost/Asdsos_PW/signup.php" class="btn" id="btn-2">Daftar</a>
                </div>
            </div>
        </nav>
        <div class="main-1">
            <div class="welcome-text">
                <h1>Selamat datang di Auction Vault</h1>
                <p>Auction Vault adalah platform lelang online modern yang dirancang untuk memberikan pengalaman lelang
                    terbaik bagi pengguna, baik penjual maupun pembeli. Dengan tampilan antarmuka yang elegan dan
                    intuitif,
                    Auction Vault menawarkan tempat yang aman, transparan, dan efisien untuk membeli atau menjual
                    barang-barang berharga, mulai dari koleksi seni, barang antik, gadget, hingga kebutuhan sehari-hari.
                </p>
            </div>
        </div>
        <div class="main-2">
            <h2 class="text-center">Penawaran Lelang</h2>
            <div class="penawaran-group d-flex justify-content-center">
                <div class="penawaran"></div>
                <div class="penawaran"></div>
                <div class="penawaran"></div>
                <div class="penawaran"></div>
                <div class="penawaran"></div>
                <div class="penawaran"></div>
            </div>

        </div>
    </div>
    <div class="main-3 d-flex">
        <div class="home"></div>
        <div class="hot d-flex align-items-end">
            <div class="tawar">
                <div class="judul-tawar d-flex align-items-center">
                    <div class="logo">

                    </div>
                    <div class="ms-auto p">
                        Salatiga City II
                    </div>
                </div>
                <p>1 Bidang tanah dengan total luas 30M, Minat Pc gan xixixixixixi</p>
                <div class="limit">
                    <h4>Nilai Limit</h4>
                    <h2>Rp320.000.000</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-md">
        <div class="main-4">
            <h2>Cara Penawaran Lelang</h2>
            <div class="cara-group d-flex justify-content-start">
                <div class="cara">
                    <div class="isi-1">
                        <img src="" alt="">
                    </div>
                    <div class="isi-2 container">
                        <h4>Open Bidding</h4>
                        <p>Penawaran terbuka (open bidding) merupakan penawaran yang disampaikan oleh Peserta Lelang
                            dengan sistem (tren) kelipatan nilai yang berpola sesuai dengan kewenangan Pejabat Lelang,
                            masing-masing Peserta Lelang saling mengetahui penawaran yang diajukan oleh Peserta Lelang
                            lainnya.</p>
                    </div>
                </div>
                <div class="cara m-auto">
                    <div class="isi-1">
                        <img src="" alt="">
                    </div>
                    <div class="isi-2 container">
                        <h4>e-Convetional</h4>
                        <p>Lelang yang pengajuan penawarannya dilakukan oleh peserta, namun penyetoran dan pengembalian
                            uang jaminan lelang menggunakan virtual account sebagaimana mekanisme e-Auction.</p>
                    </div>
                </div>
                <div class="cara">
                    <div class="isi-1">
                        <img src="" alt="">
                    </div>
                    <div class="isi-2 container">
                        <h4>Close Bidding</h4>
                        <p>Penawaran tertutup (closed bidding) merupakan penawaran yang disampaikan oleh Peserta Lelang
                            sesuai nilai yang dikehendaki. Masing-masing Peserta Lelang dan Pejabat Lelang tidak
                            mengetahui penawaran yang diajukan oleh Peserta Lelang sebelum berakhirnya waktu pengajuan
                            penawaran</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="custom-footer d-flex justify-content-center flex-column">
    </footer>

</body>

</html>
