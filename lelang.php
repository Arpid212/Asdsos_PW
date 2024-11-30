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
            <div class="d-flex menu ms-auto align-items-center">
                <div class="menu-group">
                    <a href="http://localhost/Asdsos_PW/home.php">Beranda</a>
                    <a href="http://localhost/Asdsos_PW/lelang.php">Lelang</a>
                    <a href="">Pusat Bantuan</a>
                    <a href=""></a>
                </div>
            </div>
            <div class="button-group">
                <a href="http://localhost/Asdsos_PW/login.php" class="btn" id="btn-1">Masuk</a>
                <a href="http://localhost/Asdsos_PW/signup.php" class="btn" id="btn-2">Daftar</a>
            </div>
        </nav>

        <div class="main-lelang-1">
            <h2 class="">Katalog Lot Lelang</h2>
            <div class="sub-main d-flex">
                <div class="kategori-container">
                    <div class="filter d-flex flex-column form-check">
                        <h4 class="">Filter Kategori</h4>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Elektronik
                            </label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Rumah
                            </label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Mobil
                            </label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Motor
                            </label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Tanah
                            </label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Ruko
                            </label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Hotel dan Villa
                            </label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Gudang
                            </label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Kapal
                            </label>
                        </div>
                        <div class="harga">
                            <h4 class="">Harga</h4>
                            <div class="box-text">
                                <div class="rp">
                                    Rp.
                                </div>
                                <label for="min"></label>
                                <input type="number" name="min" id="min" placeholder="Range Harga Minimun" required>
                            </div>
                            <div class="box-text">
                                <div class="rp">
                                    Rp.
                                </div>
                                <label for="max"></label>
                                <input type="number" name="max" id="max" placeholder="Range Harga Maksimum" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center button-group">
                            <input type="submit" value="Terapkan" id="apply">
                        </div>
                    </div>
                </div>
                <div class="lelang-container">
                    <div class="lelang-group d-flex justify-content-center">
                        <div class="lelang-items container">
                            <div class="d-flex flex-column align-items-center">
                                <img class="img-lelang">
                                <div class="judul-lelang d-flex align-items-center">
                                    <img>
                                    <h5>Judul</h5>
                                </div>
                                <div class="deskripsi-lelang">
                                    <p>Deskripsi</p>
                                </div>
                                <div class="lokasi-lelang d-flex align-items-center">
                                    <img>
                                    <p>Lokasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="lelang-items container">
                            <div class="d-flex flex-column align-items-center">
                                <img class="img-lelang">
                                <div class="judul-lelang d-flex align-items-center">
                                    <img>
                                    <h5>Judul</h5>
                                </div>
                                <div class="deskripsi-lelang">
                                    <p>Deskripsi</p>
                                </div>
                                <div class="lokasi-lelang d-flex align-items-center">
                                    <img>
                                    <p>Lokasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="lelang-items container">
                            <div class="d-flex flex-column align-items-center">
                                <img class="img-lelang">
                                <div class="judul-lelang d-flex align-items-center">
                                    <img>
                                    <h5>Judul</h5>
                                </div>
                                <div class="deskripsi-lelang">
                                    <p>Deskripsi</p>
                                </div>
                                <div class="lokasi-lelang d-flex align-items-center">
                                    <img>
                                    <p>Lokasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="lelang-items container">
                            <div class="d-flex flex-column align-items-center">
                                <img class="img-lelang">
                                <div class="judul-lelang d-flex align-items-center">
                                    <img>
                                    <h5>Judul</h5>
                                </div>
                                <div class="deskripsi-lelang">
                                    <p>Deskripsi</p>
                                </div>
                                <div class="lokasi-lelang d-flex align-items-center">
                                    <img>
                                    <p>Lokasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lelang-group d-flex justify-content-center">
                        <div class="lelang-items container"></div>
                        <div class="lelang-items container"></div>
                        <div class="lelang-items container"></div>
                        <div class="lelang-items container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <footer class="custom-footer d-flex justify-content-center flex-column">
    </footer>

</body>

</html>