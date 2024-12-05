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
                <a href="cariTanah.php"><i class="fas fa-search"></i><span>Cari Tanah</span></a>
            </div>
            <div class="menu-item">
                <a href="index.html"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </div>
        </div>
        
        <div class="main-content">
            <h1>DAFTAR TANAH</h1>
            <a href="uploadTanah.php"><input type="button" value="tambah data produk"></a>
            <div class="card-container">
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
                                <a href="editTanah.php?nohp=<?= $tanah['nohp']; ?>" class="btn-edit">Edit</a>
                                <a href="deleteTanah.php?nohp=<?= $tanah['nohp']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin?')">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>     
        </div>
    </div>
</body> 
</html> 

