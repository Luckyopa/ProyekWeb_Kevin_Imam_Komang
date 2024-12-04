<?php

include "koneksi.php";
include "template/header.php";

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $luas = $_POST['luas'];
    $harga = $_POST['harga'];
    $alamat = $_POST['alamat'];
    $sertifikat = $_POST['sertifikat'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_POST['foto']; // Anda mungkin ingin menambahkan upload file untuk foto

    // Tambah data tanah
    $insert_sql = "INSERT INTO tanah (judul, luas, harga, alamat, sertifikat, deskripsi, foto) VALUES ('$judul', '$luas', '$harga', '$alamat', '$sertifikat', '$deskripsi', '$foto')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "Data tanah berhasil ditambahkan.";
        header("Location: tanah.php"); // Redirect ke halaman tanah setelah berhasil
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tanah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-left: 300px;
            max-width: 400px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Tanah</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="luas" class="form-label">Luas</label>
            <input type="text" class="form-control" id="luas" name="luas" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="sertifikat" class="form-label">Sertifikat</label>
            <input type="text" class="form-control" id="sertifikat" name="sertifikat" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="text" class="form-control" id="foto" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Tanah</button>
    </form>
</div>
</body>
</html>