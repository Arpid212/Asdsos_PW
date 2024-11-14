<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .register-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }

        .register-container h2 {
            color: #007bff;
            margin-bottom: 25px;
            font-size: 24px;
        }

        .register-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .register-container input:focus {
            border-color: #007bff;
        }

        .register-container button {
            width: 100%;
            padding: 14px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .register-container button:hover {
            background-color: #218838;
        }

        .register-container a {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .register-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Daftar Akun Baru</h2>
        <form action="http://localhost/Asdsos_PW/proses/register_proses.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <a href="http://localhost/Asdsos_PW/login.php">Sudah punya akun? Login</a>
    </div>
</body>
</html>
