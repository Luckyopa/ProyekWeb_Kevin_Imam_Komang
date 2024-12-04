<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            <a href="Register.php" class="btn-sign-up">Sign Up</a>
        </section>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
         <!-- Right Section with Registration Form -->
        <div class="right-section">
            <div class="form-container">
                <h2 class="form-title">Halo Admin</h2>
                <form action="autentikasi-admin.php" method="POST">
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="Enter your Username" required>
                </div>
                <div style="position: relative;">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password" required>
                    <i class="bi bi-eye show-password" onclick="togglePasswordVisibility()"></i>
                </div>
                <button type="submit" class="btn-submit">Sign In</button>
                <div class="social-buttons">
                    <button class="btn-social google"><i class="bi bi-google"></i> Sign In with Google</button>
                    <button class="btn-social facebook"><i class="bi bi-facebook"></i> Sign In with Facebook</button>
                </div>
                </form>
                <p class="login-link-container">
                Don't have an account? <a href="register.php" class="login-link">Register Here</a>
                </p>
        </div>
        <script>
            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.querySelector('.show-password');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('bi-eye');
                    eyeIcon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('bi-eye-slash');
                    eyeIcon.classList.add('bi-eye');
                }
            }
        </script>
    </div>
        <!-- Left Section -->
        <div class="left-section">
            <h1 class="heading">We Will Help You</h1>
            <h1 class="heading2">To Find Your Land</h1>
            <img class="logo-image" src="Gambar/Logo.png" alt="">
        </div>
</body>
</html>



