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
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <title>Log In | Colossus of Lagos - Administrative Gateway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos Administrative Login" name="description" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/logos/new/col-logo.png">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        .auth-bg {
            background: radial-gradient(circle at center, #0d1b30 0%, #070f1f 100%);
        }
        .login-card {
            background: rgba(10, 22, 40, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(212, 175, 55, 0.25) !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
        }
        .login-card:hover {
            border-color: rgba(212, 175, 55, 0.45) !important;
        }
    </style>
</head>

<body class="bg-dark">

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center py-4">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-10">
                <div class="card login-card overflow-hidden text-center h-100 p-xxl-4 p-4 mb-0 rounded-4">
                    <a href="../index.php" class="auth-brand mb-3 d-inline-block">
                        <img src="../assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" style="height: 52px; object-fit: contain;">
                    </a>

                    <h4 class="fw-bold mb-1 text-white">Administrative Gateway</h4>
                    <p class="text-warning-emphasis mb-4 fs-12 text-uppercase tracking-wider">Crucible Command & Evaluation Access</p>

                    <?php if ($error): ?>
                        <div class="alert alert-danger alert-dismissible fade show text-start py-2 px-3 fs-13 mb-3 border-danger" role="alert">
                            <i class="ti ti-alert-triangle me-1"></i> <?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="POST" class="text-start mb-3">
                        <div class="mb-3">
                            <label class="form-label fs-13 text-light" for="username">Entity Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark-subtle border-secondary text-warning"><i class="ti ti-user"></i></span>
                                <input type="text" id="username" name="username" class="form-control border-secondary" placeholder="Enter username" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-13 text-light" for="password">Security Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark-subtle border-secondary text-warning"><i class="ti ti-lock"></i></span>
                                <input type="password" id="password" name="password" class="form-control border-secondary" placeholder="Enter password" required>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-warning fw-bold py-2 text-dark d-inline-flex align-items-center justify-content-center gap-1 shadow-lg" type="submit">
                                <span>AUTHENTICATE & ENTER</span>
                                <i class="ti ti-arrow-right fs-16"></i>
                            </button>
                        </div>
                    </form>

                    <div class="pt-3 border-top border-dashed border-secondary mt-3">
                        <a href="../index.php" class="fs-12 text-muted text-decoration-none d-inline-flex align-items-center gap-1 hover-light">
                            <i class="ti ti-arrow-left"></i> Return to Public Show Platform
                        </a>
                    </div>

                    <p class="mt-4 mb-0 text-muted fs-11">
                        &copy; <?php echo date('Y'); ?> Colossus of Lagos. Official Partner: Lagos State Government.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>
</html>
