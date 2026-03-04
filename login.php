<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BeatStage Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/login-style.css">
</head>
<body>

    <div class="login-wrapper">
        <div class="login-box shadow-lg">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-white mt-2">Majo Stage</h2>
                <p class="text-light-50">Silakan login untuk mengelola event</p>
            </div>

            <form method="POST" action="controller/proses.login.php" class="needs-validation" novalidate>
                <div class="mb-4">
                    <label class="form-label text-white">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0 text-white"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" class="form-control bg-transparent text-white border-start-0" 
                        value="<?php echo $_COOKIE['username'] ?? ''; ?>" placeholder="Masukkan username" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-white">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0 text-white"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control bg-transparent text-white border-start-0" 
                        placeholder="Masukkan password" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                        <label class="form-check-label text-white-50" for="rememberMe">Remember Me</label>
                    </div>
                    <a href="#" class="text-info text-decoration-none small">Lupa Password?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow">LOGIN</button>

                <div class="text-center mt-4">
                    <a href="index.php" class="text-white-50 text-decoration-none small">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>