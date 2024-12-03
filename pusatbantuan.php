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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">

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

        <div class="main-3 mt-5">
            <h2 class="text-center mb-5">Hubungi Kami</h2>
            <div class="contact-form container">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="custom-footer d-flex justify-content-center flex-column mt-5">
        <p class="text-center">© 2024 AuctionVault. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>