<?php
$host = 'localhost';
$port = 3308;
$dbname = 'db_lelang';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>


