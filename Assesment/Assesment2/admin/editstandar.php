<?php

include "koneksi.php";
include "template/header.php";

// Cek apakah nama_kecamatan ada di URL
if (isset($_GET['id_kecamatan'])) {
    $id_kecamatan = $_GET['id_kecamatan']; // Ambil nama_kecamatan dari URL
    $sql = "SELECT k.nama_kecamatan, sh.njop 
            FROM standar_harga sh 
            JOIN kecamatan k ON sh.id_kecamatan = k.id_kecamatan
            WHERE sh.id_kecamatan = '$id_kecamatan'";
    $result = $conn->query($sql); // Menjalankan query

    // Cek apakah data ditemukan
    if ($result->num_rows > 0) {
        $standar = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "Nama kecamatan tidak ditentukan.";
    exit;
}

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_nama_kecamatan = $_POST['nama_kecamatan'];
    $new_njop = $_POST['njop'];

    // Perbarui data di tabel `standar_harga`
    $update_sql = "UPDATE standar_harga 
                    SET njop = '$new_njop' 
                   WHERE id_kecamatan = '$id_kecamatan'";

    // Pastikan tabel kecamatan diperbarui jika perlu
    $update_kecamatan = "UPDATE kecamatan 
                         SET nama_kecamatan = '$new_nama_kecamatan' 
                         WHERE id_kecamatan = '$id_kecamatan'";

    if ($conn->query($update_sql) === TRUE && $conn->query($update_kecamatan) === TRUE) {
        echo "Data standar harga berhasil diperbarui.";
        header("Location: standarharga.php"); // Redirect ke halaman standar harga setelah berhasil
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
    <title>Edit Standar Harga</title>
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
    <h2>Edit Standar Harga</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
            <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" value="<?php echo htmlspecialchars($standar['nama_kecamatan']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="njop" class="form-label">NJOP</label>
            <input type="text" class="form-control" id="njop" name="njop" value="<?php echo htmlspecialchars($standar['njop']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="standarharga.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>