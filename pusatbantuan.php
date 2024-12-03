<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    $welcomeMessage = "WELLCOME, Member " . htmlspecialchars($_SESSION['username']);
} else {
    $welcomeMessage = "Selamat datang di halaman Pusat Bantuan";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan | AuctionVault</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/Asdsos_PW/style.css">
</head>

</head>

<body>
    <div class="container-md">
    <nav class="navbar navbar-expand-lg d-flex custom-navbar">
            <div class="brand">
                <img class="img-fluid" id="logo-collapse" src="/Documents/">
                Lelang
            </div>
            <div class="d-flex menu ms-auto align-items-center">
                <div class="menu-group">
                    <a href="http://localhost/Asdsos_PW/home.php">Beranda</a>
                    <a href="http://localhost/Asdsos_PW/lelang.php">Lelang</a>
                    <a href="http://localhost/Asdsos_PW/pusatbantuan.php">Pusat Bantuan</a>
                    <a href=""></a>
                </div>
                <div class="button-group">
                    <a href="http://localhost/Asdsos_PW/login.php" class="btn" id="btn-1">Masuk</a>
                    <a href="http://localhost/Asdsos_PW/signup.php" class="btn" id="btn-2">Daftar</a>
                </div>
            </div>
        </nav>

        <div class="main-1 text-center mt-5">
            <h1 class="mb-4"><?= $welcomeMessage; ?></h1>
            <p class="lead">Butuh bantuan? Kami di sini untuk membantu Anda!</p>
        </div>

        <div class="main-2">
            <h2 class="text-center mb-5">Pertanyaan yang Sering Diajukan</h2>
            <div class="faq-group container">
                <div class="faq-item mb-4">
                    <h4 class="question">Bagaimana cara membuat akun?</h4>
                    <p class="answer">Klik tombol "Daftar" di menu navigasi atas, lalu isi formulir pendaftaran.</p>
                </div>
                <div class="faq-item mb-4">
                    <h4 class="question">Bagaimana cara melakukan penawaran?</h4>
                    <p class="answer">Pilih item yang ingin Anda tawar, lalu klik tombol "Tawar Sekarang" dan ikuti
                        panduan selanjutnya.</p>
                </div>
                <div class="faq-item mb-4">
                    <h4 class="question">Bagaimana jika saya mengalami masalah teknis?</h4>
                    <p class="answer">Anda dapat menghubungi tim dukungan kami melalui email di <a
                            href="mailto:support@auctionvault.com">support@auctionvault.com</a>.</p>
                </div>
            </div>
        </div>


    <footer class="custom-footer d-flex flex-column">
        <div class="footer-main d-flex container-lg">
            <div class="items"><img src="assets/auth/FTI.png" alt="">
            </div>
            <div class="items">
                <h4>Layanan</h4>
                <p>Daftar Barang Lelang</p>
                <p>Daftar Kelas Lelang</p>
                <p>Ijin Operasional Perlelangan</p>
                <p>Lowongan Kerja Part II</p>
                <p>Laporan Kinerja</p>
                <p>Ijin Pindah Wilayah Jabatan</p>
                <p>Ijin Bolos Kuliah</p>
            </div>
            <div class="items">
                <h4>Hubungi Kami</h4>
                <div class="contact">
                    <div class="img">
                        <img src="assets/footer/call.png">
                    </div>
                    <p>Call Center 692-691</p>
                </div>
                <div class="contact">
                    <div class="img">
                        <img src="assets/footer/email.png">
                    </div>
                    <p>auction.care@uksw.edu</p>
                </div>
                <div class="contact">
                    <div class="img">
                        <img src="assets/footer/facebook.png">
                    </div>
                    <p>Auction Vault</p>
                </div>
                <div class="contact">
                    <div class="img">
                        <img src="assets/footer/lokasi.png">
                    </div>
                    <p>Gedung FTI UKSW, Jl. Notohomidjodjo, Blotongan, Salatiga</p>
                </div>
            </div>
        </div>
        <div class="copyright d-flex justify-content-start align-items-center">
            <p>© Pasteright 2024. Auction Vault, Universitas Kristen Satya Wacana.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>