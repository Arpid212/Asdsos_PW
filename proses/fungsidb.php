<?php
include 'koneksi.php';

// Fungsi untuk membuat user baru
function createUser($conn, $username, $password) {
    // Hash password sebelum menyimpannya
    $password_hash = hash('sha256', $password);

    // Default role untuk member (id_role = 2)
    $default_role = 2;

    // Query menggunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash, id_role) VALUES (?, ?, ?)");
    $stmt->bind_param("sssi", $username, $password_hash, $default_role);

    // Eksekusi statement dan cek hasilnya
    if ($stmt->execute()) {
        // Redirect ke halaman signup.php jika berhasil
        header('Location: ../signup.php?success=1');
        exit();
    } else {
        // Tampilkan error jika ada masalah
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    // Tutup statement
    $stmt->close();
}
?>
