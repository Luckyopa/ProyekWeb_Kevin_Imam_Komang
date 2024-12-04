<?php session_start(); 
include "koneksi.php" ; 
define('HOST', "http://localhost/assesment2/index.html" ); ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>dashboard admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <style>
            .sidebar {
                height: 100vh;
                /* Menyesuaikan tinggi sidebar dengan layar */
                position: fixed;
                /* Membuat sidebar tetap pada posisi */
                top: 50px;
                left: 0;
                width: 250px;
                /* Lebar sidebar */
                background-color: #f8f9fa;
                padding-top: 20px;
            }

            .sidebar a {
                display: block;
                padding: 15px;
                text-decoration: none;
                color: #333;
                font-size: 16px;
            }

            .sidebar a:hover {
                background-color: #007bff;
                color: white;
            }

            .table {
                margin-top: 10px;
                max-width: 1000px;
                margin-left: 200px;
            }

            .buttons {
                margin-left: 400px;
                margin-top: 50px;
            }
        </style>

    </head>

    <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand ms-5">Findland</a>
                <div class="d-flex">
                    <?php
                    if ($_SESSION['role'] == "admin") {
                        ?>
                        <a href="<?= HOST . "/logout.php" ?>" class="btn btn-dark">Logout</a>
                        <?php
                    } ?>
                </div>
            </div>
        </nav>
        <div class="sidebar">
            <a href="index.php">Dashboard</a>
            <a href="user.php">User</a>
            <a href="tanah.php">Tanah</a>
            <a href="standarharga.php">Standar Harga</a>
        </div>