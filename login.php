<?php
session_start();

// Cek apakah sudah login
if (isset($_SESSION['wali_murid_id'])) {
    header('Location: dashboard.php');
    exit();
}

$error = '';

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Simulasi data wali murid (dalam praktik gunakan database)
    $wali_murid_data = [
        'username' => 'wali123',
        'password' => 'password123', // Dalam praktik gunakan hash password
        'nama' => 'Ahmad Santoso',
        'id' => 1
    ];
    
    if ($username === $wali_murid_data['username'] && $password === $wali_murid_data['password']) {
        $_SESSION['wali_murid_id'] = $wali_murid_data['id'];
        $_SESSION['wali_murid_nama'] = $wali_murid_data['nama'];
        $_SESSION['hak_akses'] = 'wali_murid';
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Wali Murid - Sistem Informasi Sekolah</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <i class="fas fa-user-shield"></i>
                <h2>Login Wali Murid</h2>
                <p>Sistem Informasi Akademik</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="login-form">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required autocomplete="username">
                </div>
                
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                </div>
                
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk
                </button>
            </form>
            
            <div class="login-footer">
                <p><strong>Demo:</strong><br>
                Username: <code>wali123</code><br>
                Password: <code>password123</code></p>
            </div>
        </div>
    </div>
</body>
</html>