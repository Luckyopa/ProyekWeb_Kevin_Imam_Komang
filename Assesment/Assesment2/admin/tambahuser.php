<?php

include "koneksi.php";
include "template/header.php";
// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];

    // Insert data pengguna baru
    $sql = "INSERT INTO user (username, role) VALUES ('$username', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Pengguna berhasil ditambahkan.";
        header("Location: user.php"); // Redirect ke halaman user setelah berhasil
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
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-left: 300px;
            max-width: 400px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah User</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="user.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>