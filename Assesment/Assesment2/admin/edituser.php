<?php

include "koneksi.php";
include "template/header.php";
// Cek apakah username ada di URL
if (isset($_GET['username'])) {
    $username = $_GET['username']; // Ambil username dari URL
    $sql = "SELECT username, role FROM user WHERE username = '$username'"; // Langsung menyisipkan variabel
    $result = $conn->query($sql); // Menjalankan pernyataan

    // Cek apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Pengguna tidak ditemukan.";
        exit;
    }
} else {
    echo "Username tidak ditentukan.";
    exit;
}

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = $_POST['username'];
    $new_role = $_POST['role'];

    // Update data pengguna
    $update_sql = "UPDATE user SET username = ?, role = ? WHERE username = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sss", $new_username, $new_role, $username);

    if ($update_stmt->execute()) {
        echo "Data pengguna berhasil diperbarui.";
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
    <title>Edit User</title>
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
    <h2>Edit User</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role" value="<?php echo htmlspecialchars($user['role']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="user.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>