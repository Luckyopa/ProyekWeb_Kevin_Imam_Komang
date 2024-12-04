<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back" />
    <title>FindLand</title>
</head>
<body class="">
    <!-- Navbar -->
    <nav class="navbar">
        <header class="navbar-header">
            <a href="#home">
                <div class="logo"></div>
            </a>
            <h1 class="site-title">FindLand</h1>
        </header>
        <section class="navbar-section">
            <a href="login.php" class="btn-sign-in">Sign In</a>
        </section>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Left Section -->
        <div class="left-section">
            <h1 class="heading">We Will Help You</h1>
            <h1 class="heading2">To Find Your Land</h1>
            <img class="logo-image" src="Gambar/Logo.png" alt="">
        </div>

        <!-- Right Section with Registration Form -->
        <div class="right-section">
            <div class="form-container">
                <!-- <i class="bi bi-arrow-left-short icon-large"></i> -->
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
                <a href="#cover" class="back-link">Back</a>
                <h2 class="form-title">Create Account!</h2>
                <form action="#" method="POST" class="form">
                    <div class="form-grid">
                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-input" required>
                        </div>
                        <div>
                            <label for="nohp" class="form-label">No Handphone</label>
                            <input type="tel" id="nohp" name="nohp" class="form-input" required>
                        </div>
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-input" required>
                        </div>
                        <div>
                            <label for="alamat" class="form-label">Address</label>
                            <input type="text" id="alamat" name="alamat" class="form-input" required>
                        </div>
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-input" required>
                        </div>
                        <div>
                            <label for="passwordr" class="form-label">Confirm Password</label>
                            <input type="password" id="passwordr" name="passwordr" class="form-input" required>
                        </div>
                        <div>
                            <label for="role" class="form-label">Choose Role</label>
                            <select id="role" name="role" class="form-input" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <?php
                    include "dbConfig.php";

                    if (isset($_POST['btn-submit'])) {
                        // Ambil data dari form
                        $username = $_POST["username"];
                        $nohp =  $_POST["nohp"];
                        $email =  $_POST["email"];
                        $alamat = $_POST["alamat"];
                        $password =$_POST["password"];
                        $passwordr =  $_POST["passwordr"];
                        $role = $_POST["role"];

                        // Validasi password dan confirm password
                        if ($password !== $passwordr) {
                            die("Password dan Confirm Password tidak cocok.");
                        }

                        // Hash password untuk keamanan
                        $hashedPassword = md5($password);

                        // Query untuk menyimpan data ke database
                        $sqlStatement = "INSERT INTO pendaftaran VALUES ('$username', '$nohp', '$email', '$alamat', '$hashedPassword', '$role')";
                        $query = mysqli_query($conn, $sqlStatement);

                        // Debug dan konfirmasi penyimpanan data
                        if ($query) {
                            echo "Data berhasil ditambahkan, Silahkan Login!!!";
                            
                            // Arahkan berdasarkan role yang dipilih
                            if ($role == 'admin') {
                                header("Location: login-admin.php"); // Halaman login admin
                            } else {
                                header("Location: login.php"); // Halaman login user
                            }
                        } else {
                            echo "Data gagal dimasukkan: " . mysqli_error($conn);
                        }
                    }
                    ?>
                    <div>
                        <button type="submit" name="btn-submit" class="btn-submit">Sign Up</button>
                    </div>
                    <div class="social-buttons">
                        <button class="btn-social google"><i class="bi bi-google"></i> Sign Up with Google</button>
                        <button class="btn-social facebook"><i class="bi bi-facebook"></i> Sign Up with Facebook</button>
                    </div>
                </form>
                <p class="login-link-container">
                    I have an Account? <a href="#login" class="login-link">Login</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>



