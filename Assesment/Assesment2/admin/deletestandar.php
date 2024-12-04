<?php
include "koneksi.php";
include "template/header.php";

// Cek apakah nama_kecamatan ada di URL
if (isset($_GET['id_kecamatan'])) {
    $id_kecamatan = $_GET['id_kecamatan']; 

    // Hapus data standar harga
    $sql = "DELETE FROM standar_harga WHERE id_kecamatan = '$id_kecamatan'";

    if ($conn->query($sql) === TRUE) {
        echo "Data standar harga berhasil dihapus.";
        header("Location: standarharga.php"); // Redirect ke halaman standar harga setelah berhasil
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Nama kecamatan tidak ditentukan.";
    exit;
}
?>