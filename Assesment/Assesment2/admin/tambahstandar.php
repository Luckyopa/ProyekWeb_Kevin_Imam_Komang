<?php
session_start();
include "koneksi.php";
include "template/header.php";

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kota = $_POST['nama_kota'];
    $nama_kecamatan = $_POST['nama_kecamatan'];
    $njop = $_POST['njop'];

    // Insert data standar harga baru
    $sql_kota = "INSERT INTO kota (nama_kota) VALUES ('$nama_kota')";
    if ($conn->query($sql_kota)) {
        // Ambil ID kota yang baru saja ditambahkan
        $id_kota = $conn->insert_id;
    
        // Tambahkan data ke tabel kecamatan
        $sql_kecamatan = "INSERT INTO kecamatan (nama_kecamatan, id_kota) VALUES ('$nama_kecamatan', '$id_kota')";
        if ($conn->query($sql_kecamatan)) {
            // Ambil ID kecamatan yang baru saja ditambahkan
            $id_kecamatan = $conn->insert_id;
    
            // Tambahkan data ke tabel standar_harga
            $sql_harga = "INSERT INTO standar_harga (id_kota, id_kecamatan, njop) VALUES ('$id_kota', '$id_kecamatan', '$njop')";
            if ($conn->query($sql_harga)) {
                echo "Data berhasil ditambahkan.";
            } else {
                echo "Error saat menambahkan standar harga: " . $conn->error;
            }
        } else {
            echo "Error saat menambahkan kecamatan: " . $conn->error;
        }
    } else {
        echo "Error saat menambahkan kota: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Standar Harga</title>
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
    <h2>Tambah Standar Harga</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama_kecamatan" class="form-label">Nama Kota</label>
            <input type="text" class="form-control" id="nama_kota" name="nama_kota" required>
        </div>
        <div class="mb-3">
            <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
            <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" required>
        </div>
        <div class="mb-3">
            <label for="njop" class="form-label">NJOP</label>
            <input type="text" class="form-control" id="njop" name="njop" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="standarharga.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>