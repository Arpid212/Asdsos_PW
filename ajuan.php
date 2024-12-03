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
                <img class="img-fluid" id="logo-collapse" src="/Documents/">
                Lelang
            </div>
            <div class="d-flex menu ms-auto align-items-center">
                <div class="menu-group">
                    <a href="home.php">Beranda</a>
                    <a href="lelang.php">Lelang</a>
                    <a href="pusatbantuan.php">Pusat Bantuan</a>
                    <a href=""></a>
                </div>
                <div class="button-group">
                    <a href="login.html" class="btn" id="btn-1">Masuk</a>
                    <a href="signup.html" class="btn" id="btn-2">Daftar</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="container-md">
        <div class="main-ajuan d-flex flex-column align-items-center">
            <h2 class="">Form Pengajuan Lelang</h2>
            <div class="sub-main d-flex justify-content-center container mt-3">
                <div class="form">
                    <form action="" class="container">
                        <h2>Biodata Diri</h2>
                        <hr>
                        <div class="form-input">
                            <label for="nama">Nama Lengkap :</label>
                            <input type="text" name="nama" id="nama" placeholder="Masukan Nama Lengkap" required>
                        </div>
                        <div class="form-input">
                            <label for="nik">NIK :</label>
                            <input type="number" name="nik" id="nik" placeholder="Masukan Nomer Induk Kependudukan"
                                maxlength="16" required>
                        </div>
                        <div class="form-input">
                            <label for="alamat">Alamat :</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap" required>
                        </div>
                        <div class="form-input">
                            <label for="notlpn">No Telepon :</label>
                            <input type="number" name="notlpn" id="notlpn" placeholder="Masukan Nomer Telepon" required>
                        </div>
                        <div class="form-input">
                            <label for="email">Email :</label>
                            <input type="email" name="email" id="email" placeholder="Masukan Email" required>
                        </div>
                        <h2>Rincian Barang</h2>
                        <hr>
                        <div class="form-input">
                            <label for="nama_barang">Nama Barang :</label>
                            <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukan Nama Barang"
                                required>
                        </div>
                        <div class="form-input">
                            <label for="deskripsi">Deskripsi Barang :</label>
                            <input type="text" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi"
                                maxlength="124" required>
                        </div>
                        <div class="form-input">
                            <label for="kategori">Kategori Barang:</label>
                            <select id="kategori" name="kategori" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                <option value="elektronik">Elektronik</option>
                                <option value="rumah">Rumah</option>
                                <option value="mobil">Mobil</option>
                                <option value="motor">Motor</option>
                                <option value="tanah">Tanah</option>
                                <option value="ruko">Ruko</option>
                                <option value="pabrik">Pabrik</option>
                                <option value="hdv">Hotel dan Villa</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-input">
                            <label for="harga">Harga Awal (Rp):</label>
                            <input type="number" name="harga" id="harga" placeholder="Masukan Harga Awal" required>
                        </div>
                        <div class="form-input">
                            <label for="foto">Upload Foto Barang:</label>
                            <input type="file" name="foto" id="foto" accept="image/*" required>
                        </div>
                        <div class="form-input">
                            <label for="catatan">Catatan Tambahan:</label>
                            <input type="text" name="catatan" id="catatan" placeholder="Catatan Tambahan ( Opsional )">
                        </div>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                Saya telah membaca dan menyetujui <a href="terms.html" target="_blank">syarat dan
                                    ketentuan</a>.
                            </label>
                        </div>
                        <div class="form-input mt-3">
                            <button type="submit" id="submit-btn" class="btn btn-primary" disabled>Ajukan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="custom-footer d-flex flex-column">
        <div class="footer-main d-flex container-lg">
            <div class="items"><img src="assets/" alt="">
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

    <script>
        const termsCheckbox = document.getElementById("terms");
        const submitButton = document.getElementById("submit-btn");

        termsCheckbox.addEventListener("change", function () {
            submitButton.disabled = !this.checked;
        });
    </script>
</body>

</html>