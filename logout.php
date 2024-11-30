<?php
session_start(); // Memulai session

// Hapus semua data session
session_unset(); // Menghapus semua variabel session
session_destroy(); // Menghancurkan session

// Redirect ke halaman login
echo "<script>alert('Anda telah berhasil logout.'); window.location.href=' home.php';</script>";
exit();
?>
