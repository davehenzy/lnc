<?php
session_start();
require_once '../config.php';

if (isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid credentials. ACCESS DENIED.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLOSSUS COMMAND | LOGIN</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div style="text-align: center; margin-bottom: 40px;">
                <img src="../assets/logos/LNC_Logo_Light.png" alt="Logo" style="height: 60px;">
                <p style="color: var(--text-muted); font-size: 0.7rem; letter-spacing: 3px; margin-top: 15px;">ADMINISTRATIVE GATEWAY</p>
            </div>
            
            <?php if ($error): ?>
                <div style="background: rgba(220, 53, 69, 0.1); color: #dc3545; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 0.8rem; text-align: center; border: 1px solid rgba(220, 53, 69, 0.2);">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label>Entity Name</label>
                    <input type="text" name="username" class="form-input" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-login">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html>
