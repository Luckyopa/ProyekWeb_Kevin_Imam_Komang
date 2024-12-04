<?php
include('dbConfig.php');

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $luas = $_POST['luas'];
    $harga = $_POST['harga'];
    $sertifikat = $_POST['sertifikat'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];

    $foto = $_FILES['foto'];
    if (!empty($foto['name'])) {
        $photoname = time() . '_' . $foto['name'];
        move_uploaded_file($foto['tmp_name'], '../Assesment2/images/' . $photoname);
    } else {
        $photoname = "";
    }

    $sqlstatement = "INSERT INTO uploadtanah VALUES ('$nama', '$nohp', '$luas', '$harga', '$sertifikat', '$lokasi', '$deskripsi', '$photoname')";

    $query = mysqli_query($conn, $sqlstatement);

    if ($query) {
        header("location: tampildata.php");
    } else {
        echo "Data gagal disimpan";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindLand</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-uploadTanah.css">
</head>
<body>

<div class="header">
    <div class="logo">
        <img alt="Logo" height="40" src="images/logo.png" width="40" />
        <span>FindLand</span>
    </div>
    <div class="user-info">
        <a href="keranjang.html"><i class="fas fa-shopping-cart"></i></a>
        <a href=""><i class="fas fa-bell"></i></a>
        <a href="chat.html"><i class="fas fa-comment"></i></a>
        <span>Username</span>
        <img alt="User Image" height="40" src="images/user.png" width="40" />
    </div>
</div>

<div class="container">
    <div class="sidebar">
        <div class="menu-item">
            <a href="dashboard.html"><i class="fas fa-home"></i><span>Beranda</span></a>
        </div>
        <div class="menu-item">
            <a href="standarharga.html"><i class="fas fa-chart-bar"></i><span>Standar Harga</span></a>
        </div>
        <div class="menu-item">
            <a href="edukasiTanah.html"><i class="fas fa-book"></i><span>Edukasi Tanah</span></a>
        </div>
        <div class="menu-item">
            <a href="pengaturan.html"><i class="fas fa-cog"></i><span>Pengaturan</span></a>
        </div>
        <div class="menu-item">
            <a href="cariTanah.html"><i class="fas fa-search"></i><span>Cari Tanah</span></a>
        </div>
        <div class="menu-item">
            <a href="index.html"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
        </div>
    </div>

    <!-- Upload Tanah Section -->
    <div class="main-content">
        <h2 class="form-title">Upload Tanah</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="upload-form">
            <div class="upload-container">
                <div class="input-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Nama lengkap" required>
                </div>
                <div class="input-group">
                    <label for="nohp">No Handphone</label>
                    <input type="text" name="nohp" id="nohp" placeholder="No Handphone" required>
                </div>
                <div class="input-group">
                    <label for="luas">Luas Tanah</label>
                    <input type="text" name="luas" id="luas" placeholder="Luas tanah" required>
                </div>
                <div class="input-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" placeholder="Harga" required>
                </div>
                <div class="input-group">
                    <label for="sertifikat">Sertifikat</label>
                    <input type="text" name="sertifikat" id="sertifikat" placeholder="Sertifikat" required>
                </div>
                <div class="input-group">
                    <label for="lokasi">Lokasi / Alamat</label>
                    <input type="text" name="lokasi" id="lokasi" placeholder="Lokasi / Alamat" required>
                </div>
                <div class="input-group">
                    <label for="deskripsi">Deskripsi Tanah</label>
                    <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi tanah" required></textarea>
                </div>
                <div class="input-group">
                    <label for="gambar">Upload Gambar</label>
                    <input type="file" name="foto" id="foto" required>
                </div>
                <button type="submit" name="submit" class="upload-button">UPLOAD</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>

