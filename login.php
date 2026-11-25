<?php
/**
 * Login Page - Cashoes
 */

session_start();

// Jika sudah login, langsung ke homepage
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$error = '';

// Proses form login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Username dan password harus diisi.';
    } else {
        // Load data user
        require_once __DIR__ . '/data/users.php';

        $found = false;
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $found = true;
                if (password_verify($password, $user['password'])) {
                    // Login berhasil
                    session_regenerate_id(true);
                    $_SESSION['user'] = $user['username'];
                    $_SESSION['name'] = $user['name'];
                    header('Location: index.php');
                    exit;
                } else {
                    $error = 'Password salah.';
                }
                break;
            }
        }

        if (!$found) {
            $error = 'Username tidak ditemukan.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cashoes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-page">

    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">
                <div class="login-icon">
                    <i class="fas fa-shoe-prints"></i>
                </div>
                <h1>Cashoes</h1>
                <p>Jasa Cuci Sepatu Profesional</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-circle-exclamation"></i>
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="login-form" autocomplete="off">
                <div class="form-group">
                    <label for="username">
                        <i class="fas fa-user"></i> Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="form-input"
                        placeholder="Masukkan username"
                        value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                        required 
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary btn-full">
                    <i class="fas fa-right-to-bracket"></i> Login
                </button>
            </form>

            <div class="login-footer">
                <p><i class="fas fa-info-circle"></i> Demo: <strong>admin</strong> / <strong>admin123</strong></p>
            </div>
        </div>
    </div>

</body>
</html>
