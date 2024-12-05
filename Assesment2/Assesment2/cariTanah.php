<?php
include "dbConfig.php";

$sqlstatement = "SELECT * FROM uploadtanah";
$query = mysqli_query($conn, $sqlstatement);
$dataTanah = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style-cariTanah.css">
    <title>Cari Tanah</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img alt="Logo" height="40" src="images/WhatsApp_Image_2024-11-25_at_14.41.37-removebg-preview.png" width="40" />
            <span>FindLand</span>
        </div>
        <div class="user-info">
            <a href="keranjang.html"><i class="fas fa-shopping-cart"></i></a>
            <a href=""><i class="fas fa-bell"></i></a>
            <a href="chat.html"><i class="fas fa-comment"></i></a>
            <span>Username</span>
            <img alt="User Image" height="40" src="images/F9-768x639.png" width="40" />
        </div>
    </div>
    <main>
        <div class="container-1">
            <div class="sidebar">
                <div class="menu-item"><a href="dashboard.html"><i class="fas fa-home"></i><span>Beranda</span></a></div>
                <div class="menu-item"><a href="standarharga.html"><i class="fas fa-chart-bar"></i><span>Standar Harga</span></a></div>
                <div class="menu-item"><a href="edukasiTanah.html"><i class="fas fa-book"></i><span>Edukasi Tanah</span></a></div>
                <div class="menu-item"><a href="pengaturan.html"><i class="fas fa-cog"></i><span>Pengaturan</span></a></div>
                <div class="menu-item"><a href="cariTanah.html"><i class="fas fa-search"></i><span>Cari Tanah</span></a></div>
                <div class="menu-item"><a href="index.html"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></div>
            </div>
        </div>
        <div class="container">
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <div class="tombol1">
                    <button><a href="uploadTanah.html">Upload Tanah</a></button>
                    <button><a href="filter.html">Filter</a></button>
                    <button><a href="tampilData.php">TanahKu</a></button>
                </div>
            </div>
            <div class="grid">
                <?php foreach ($dataTanah as $tanah): ?>
                    <div class="card">
                        <img src="../Assesment2/images/<?=$tanah['foto']; ?>" alt="Tanah Image" class="card-image">
                        <div class="card-content">
                            <h3>Rp. <?= number_format($tanah['harga'], 0, ',', '.'); ?></h3>
                            <p>Tanah <?= $tanah['luas']; ?>m²</p>
                            <p><?= $tanah['lokasi']; ?></p>
                            <p>Sertifikat: <?= $tanah['sertifikat']; ?></p>
                            <p>Kontak: <?= $tanah['nohp']; ?></p>
                            <div class="card-actions">
                                <a href="#"><button class="btn-add-cart">
                                    <i class="fas fa-shopping-cart"></i> Tambah ke Keranjang
                                </button></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="main-content">
    </div>
</body>

</html>
