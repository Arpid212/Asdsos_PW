<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | AuctionVault</title>
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

<div class="container d-flex justify-content-center align-items-center login">
    <div class="bg-login d-flex">
        <div class="bg-img">

        </div>
        <div class="bg-form d-flex justify-content-center align-items-center flex-column">
            <h1>Daftar Akun</h1>
            <form action="" class="d-flex flex-column">
                <div class="box-group d-flex flex-column align-items-center">
                    <div class="box-text">
                        <img src="/Main/assets/auth/username.png">
                        <label for="username"></label>
                        <input type="text" name="username" id="username" placeholder="Masukan Username" required>
                    </div>
                    <div class="box-text">
                        <img src="/Main/assets/auth/email.png" alt="">
                        <label for="email"></label>
                        <input type="email" name="email" id="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="box-text">
                        <img src="/Main/assets/auth/password.png" alt="">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="Masukan Password" required>
                    </div>
                </div>
                
            </form>
            <div class="d-flex justify-content-center button-group">
                    <a href="http://localhost/Asdsos_PW/login.php"><input type="submit" value="Sudah punya akun?" id="daftar"></a>
                    <input type="submit" value="Daftar">
            </div>
        </div>
    </div>
</div>