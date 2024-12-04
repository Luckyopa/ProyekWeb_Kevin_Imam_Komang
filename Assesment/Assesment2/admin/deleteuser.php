<?php

include "koneksi.php";
include "template/header.php";
// Cek apakah username ada di URL
if (isset($_GET['username'])) {
    $username = $_GET['username']; // Ambil username dari URL

    // Hapus data pengguna
    $sql = "DELETE FROM user WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Pengguna berhasil dihapus.";
        header("Location: user.php"); // Redirect ke halaman user setelah berhasil
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Username tidak ditentukan.";
    exit;
}
?>