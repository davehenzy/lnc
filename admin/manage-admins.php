<?php
session_start();
require_once '../config.php';

require_super_admin();

$msg = $_GET['msg'] ?? '';
$err = $_GET['err'] ?? '';

// Handle Create Administrator
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create_admin') {
    $username = trim($_POST['username'] ?? '');
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'admin';

    if (empty($username) || empty($password)) {
        header("Location: manage-admins.php?err=" . urlencode("Username and password are required."));
        exit();
    }

    // Check if username already exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        header("Location: manage-admins.php?err=" . urlencode("Username '{$username}' is already taken."));
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO admins (username, password, full_name, email, role, status) VALUES (?, ?, ?, ?, ?, 'active')");
    $stmt->execute([$username, $hash, $full_name, $email, $role]);

    log_audit_action($pdo, 'Create Administrator', "Super Admin created new user '{$username}' with role '{$role}'.");

    header("Location: manage-admins.php?msg=" . urlencode("Administrator '{$username}' successfully created."));
    exit();
}

// Handle Update Administrator
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_admin') {
    $admin_id = (int)($_POST['admin_id'] ?? 0);
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = $_POST['role'] ?? 'admin';
    $status = $_POST['status'] ?? 'active';
    $new_password = $_POST['new_password'] ?? '';

    // Check target exists
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE id = ?");
    $stmt->execute([$admin_id]);
    $target = $stmt->fetch();

    if (!$target) {
        header("Location: manage-admins.php?err=" . urlencode("Administrator record not found."));
        exit();
    }

    // Prevent demoting self or deactivating self if logged in
    if ($admin_id === (int)$_SESSION['admin_id']) {
        $role = 'super_admin';
        $status = 'active';
    }

    if (!empty($new_password)) {
        $hash = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE admins SET full_name = ?, email = ?, role = ?, status = ?, password = ? WHERE id = ?");
        $stmt->execute([$full_name, $email, $role, $status, $hash, $admin_id]);
    } else {
        $stmt = $pdo->prepare("UPDATE admins SET full_name = ?, email = ?, role = ?, status = ? WHERE id = ?");
        $stmt->execute([$full_name, $email, $role, $status, $admin_id]);
    }

    log_audit_action($pdo, 'Update Administrator', "Super Admin updated details for user '{$target['username']}' (ID: {$admin_id}).");

    header("Location: manage-admins.php?msg=" . urlencode("Administrator '{$target['username']}' updated successfully."));
    exit();
}

// Handle Toggle Status
if (isset($_GET['action']) && $_GET['action'] === 'toggle_status' && isset($_GET['id'])) {
    $admin_id = (int)$_GET['id'];
    if ($admin_id === (int)$_SESSION['admin_id']) {
        header("Location: manage-admins.php?err=" . urlencode("You cannot suspend your own account."));
        exit();
    }

    $stmt = $pdo->prepare("SELECT username, status FROM admins WHERE id = ?");
    $stmt->execute([$admin_id]);
    $admin_record = $stmt->fetch();

    if ($admin_record) {
        $new_status = ($admin_record['status'] === 'active') ? 'inactive' : 'active';
        $pdo->prepare("UPDATE admins SET status = ? WHERE id = ?")->execute([$new_status, $admin_id]);
        log_audit_action($pdo, 'Toggle Admin Status', "Switched user '{$admin_record['username']}' status to '{$new_status}'.");
        header("Location: manage-admins.php?msg=" . urlencode("Status for '{$admin_record['username']}' changed to {$new_status}."));
        exit();
    }
}

// Handle Delete Administrator
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $admin_id = (int)$_GET['id'];
    if ($admin_id === (int)$_SESSION['admin_id']) {
        header("Location: manage-admins.php?err=" . urlencode("Security restriction: You cannot delete your own Super Admin account."));
        exit();
    }

    $stmt = $pdo->prepare("SELECT username FROM admins WHERE id = ?");
    $stmt->execute([$admin_id]);
    $target_user = $stmt->fetchColumn();

    if ($target_user) {
        $pdo->prepare("DELETE FROM admins WHERE id = ?")->execute([$admin_id]);
        log_audit_action($pdo, 'Delete Administrator', "Super Admin deleted administrator '{$target_user}' (ID: {$admin_id}).");
        header("Location: manage-admins.php?msg=" . urlencode("Administrator '{$target_user}' deleted."));
        exit();
    }
}

// Fetch all admins
$stmt = $pdo->query("SELECT * FROM admins ORDER BY id ASC");
$all_admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Metrics
$total_admins = count($all_admins);
$super_admins_count = 0;
$active_admins_count = 0;
foreach ($all_admins as $a) {
    if ($a['role'] === 'super_admin') $super_admins_count++;
    if ($a['status'] === 'active') $active_admins_count++;
}

$unread_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'unread'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Manage Administrators | Colossus of Lagos - Super Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos Super Admin Management" name="description" />

    <link rel="shortcut icon" href="../assets/logos/new/col-logo.png">
    <script src="assets/js/config.js"></script>
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        :root {
            --colossus-gold: #d4af37;
            --colossus-gold-light: #f5c518;
            --colossus-navy: #0a1628;
            --colossus-navy-dark: #070f1f;
        }
        .text-gold { color: var(--colossus-gold) !important; }
        .bg-gold { background-color: var(--colossus-gold) !important; color: #0a1628 !important; }
        .border-gold { border-color: var(--colossus-gold) !important; }
        .badge-super-admin {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.25), rgba(245, 197, 24, 0.15));
            color: #b8941f;
            border: 1px solid rgba(212, 175, 55, 0.4);
            font-weight: 700;
        }
        .badge-admin {
            background: rgba(13, 110, 253, 0.12);
            color: #0d6efd;
            border: 1px solid rgba(13, 110, 253, 0.25);
            font-weight: 600;
        }
        .badge-moderator {
            background: rgba(111, 66, 193, 0.12);
            color: #6f42c1;
            border: 1px solid rgba(111, 66, 193, 0.25);
            font-weight: 600;
        }
        .logo-img { max-height: 42px; width: auto; object-fit: contain; }
    </style>
</head>

<body>
    <div class="wrapper">

        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu">
            <a href="index.php" class="logo">
                <span class="logo-light">
                    <span class="logo-lg"><img src="../assets/logos/new/col-logo.png" alt="Colossus of Lagos" class="logo-img"></span>
                    <span class="logo-sm text-center"><img src="../assets/logos/new/col-logo.png" alt="Colossus" style="height: 30px;"></span>
                </span>
                <span class="logo-dark">
                    <span class="logo-lg"><img src="../assets/logos/new/col-logo.png" alt="Colossus of Lagos" class="logo-img"></span>
                    <span class="logo-sm text-center"><img src="../assets/logos/new/col-logo.png" alt="Colossus" style="height: 30px;"></span>
                </span>
            </a>

            <button class="button-sm-hover">
                <i class="ti ti-circle align-middle"></i>
            </button>

            <div data-simplebar>
                <ul class="side-nav">
                    <li class="side-nav-title">Navigation</li>

                    <li class="side-nav-item">
                        <a href="index.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="applicants.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-users"></i></span>
                            <span class="menu-text"> Applicants </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="enquiries.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-mail"></i></span>
                            <span class="menu-text"> Enquiries </span>
                            <?php if ($unread_enquiries > 0): ?>
                                <span class="badge bg-danger rounded-pill"><?php echo $unread_enquiries; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <!-- Super Admin Exclusive Navigation Section -->
                    <li class="side-nav-title mt-2 text-warning fw-bold">
                        <i class="ti ti-shield-lock me-1"></i> SUPER ADMIN
                    </li>

                    <li class="side-nav-item">
                        <a href="manage-admins.php" class="side-nav-link active">
                            <span class="menu-icon"><i class="ti ti-user-shield text-warning"></i></span>
                            <span class="menu-text"> Manage Admins </span>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill"><?php echo $total_admins; ?></span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="settings.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-adjustments text-warning"></i></span>
                            <span class="menu-text"> System Settings </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="audit-logs.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-history text-warning"></i></span>
                            <span class="menu-text"> Security Audit Logs </span>
                        </a>
                    </li>

                    <li class="side-nav-title mt-2">Tools & Actions</li>

                    <li class="side-nav-item">
                        <a href="export-excel.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-file-spreadsheet"></i></span>
                            <span class="menu-text"> Export to Excel </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="../index.php" target="_blank" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-external-link"></i></span>
                            <span class="menu-text"> View Live Site </span>
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Sidenav Menu End -->

        <!-- Topbar Start -->
        <header class="app-topbar">
            <div class="page-container topbar-menu">
                <div class="d-flex align-items-center gap-2">
                    <button class="sidenav-toggle-button btn btn-light btn-icon rounded-circle">
                        <i class="ti ti-menu-2 fs-20"></i>
                    </button>
                    <span class="badge badge-super-admin px-2.5 py-1 text-uppercase fs-11 d-none d-sm-inline-flex align-items-center gap-1">
                        <i class="ti ti-shield-check"></i> Super Administrator Authority
                    </span>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <!-- User Dropdown -->
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,19" type="button" aria-haspopup="false" aria-expanded="false">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="avatar-title bg-warning-subtle text-warning border border-warning rounded-circle fw-bold p-1 fs-12" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;">
                                        <i class="ti ti-shield"></i>
                                    </span>
                                    <span class="d-none d-md-block text-start">
                                        <span class="fs-13 fw-bold d-block text-dark"><?php echo htmlspecialchars($_SESSION['admin_fullname'] ?? 'Super Admin'); ?></span>
                                        <small class="text-warning fw-semibold fs-11">Super Administrator</small>
                                    </span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Super Admin Command</h6>
                                </div>
                                <a href="manage-admins.php" class="dropdown-item"><i class="ti ti-user-shield me-2 text-warning"></i><span>Manage Admins</span></a>
                                <a href="settings.php" class="dropdown-item"><i class="ti ti-adjustments me-2 text-warning"></i><span>System Settings</span></a>
                                <a href="audit-logs.php" class="dropdown-item"><i class="ti ti-history me-2 text-warning"></i><span>Audit Trail</span></a>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item text-danger"><i class="ti ti-logout me-2"></i><span>Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Topbar End -->

        <!-- Start Page Content here -->
        <div class="page-content">
            <div class="page-container">

                <!-- Page Title / Header -->
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 my-4">
                    <div>
                        <h4 class="fs-18 text-uppercase fw-bold m-0 d-flex align-items-center gap-2">
                            <i class="ti ti-user-shield text-warning"></i> Administrator Governance
                        </h4>
                        <p class="text-muted fs-12 mb-0 mt-1">Super Admin Role-Based Access Control, administrative accounts & credentials</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-warning fw-bold d-flex align-items-center gap-1.5 shadow-sm" data-bs-toggle="modal" data-bs-target="#createAdminModal">
                            <i class="ti ti-plus fs-16"></i>
                            <span>Create Administrator</span>
                        </button>
                    </div>
                </div>

                <!-- Flash Alerts -->
                <?php if ($msg): ?>
                    <div class="alert alert-success alert-dismissible fade show py-2.5 px-3 fs-13 mb-3 d-flex align-items-center" role="alert">
                        <i class="ti ti-circle-check fs-18 me-2"></i>
                        <span><?php echo htmlspecialchars($msg); ?></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if ($err): ?>
                    <div class="alert alert-danger alert-dismissible fade show py-2.5 px-3 fs-13 mb-3 d-flex align-items-center" role="alert">
                        <i class="ti ti-alert-circle fs-18 me-2"></i>
                        <span><?php echo htmlspecialchars($err); ?></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- KPI Metric Summary Row -->
                <div class="row row-cols-1 row-cols-md-3 g-3 mb-4">
                    <div class="col">
                        <div class="card h-100 border-start border-3 border-primary shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="fs-12 text-muted fw-bold text-uppercase">Total Administrators</span>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-18">
                                            <i class="ti ti-users"></i>
                                        </span>
                                    </div>
                                </div>
                                <h2 class="my-2 fw-bold"><?php echo $total_admins; ?></h2>
                                <small class="text-muted fs-11">Authorized dashboard users</small>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 border-start border-3 border-warning shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="fs-12 text-muted fw-bold text-uppercase">Super Admins</span>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-18">
                                            <i class="ti ti-shield-lock"></i>
                                        </span>
                                    </div>
                                </div>
                                <h2 class="my-2 fw-bold text-warning"><?php echo $super_admins_count; ?></h2>
                                <small class="text-muted fs-11">Full governance & privilege</small>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 border-start border-3 border-success shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="fs-12 text-muted fw-bold text-uppercase">Active Accounts</span>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded-circle fs-18">
                                            <i class="ti ti-circle-check"></i>
                                        </span>
                                    </div>
                                </div>
                                <h2 class="my-2 fw-bold text-success"><?php echo $active_admins_count; ?></h2>
                                <small class="text-muted fs-11">Authorized and active</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Administrators Registry Table -->
                <div class="card shadow-sm">
                    <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="card-title mb-0 fs-15 text-uppercase fw-bold">Administrator Accounts</h4>
                            <span class="badge bg-secondary-subtle text-secondary fs-11"><?php echo $total_admins; ?> Total</span>
                        </div>
                        <small class="text-muted fs-12">Only Super Administrators have access to this directory.</small>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-3">Administrator</th>
                                        <th>Contact Email</th>
                                        <th>Role Authority</th>
                                        <th>Account Status</th>
                                        <th>Last Login</th>
                                        <th class="text-end pe-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all_admins as $admin): ?>
                                        <tr>
                                            <td class="ps-3">
                                                <div class="d-flex align-items-center gap-2.5">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-light text-dark border rounded-circle fw-bold fs-13">
                                                            <?php echo strtoupper(substr($admin['username'], 0, 2)); ?>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h6 class="fs-13 mb-0 fw-bold d-flex align-items-center gap-1.5">
                                                            <span><?php echo htmlspecialchars($admin['full_name'] ?: $admin['username']); ?></span>
                                                            <?php if ((int)$admin['id'] === (int)$_SESSION['admin_id']): ?>
                                                                <span class="badge bg-warning text-dark fs-10 px-1 py-0.5">YOU</span>
                                                            <?php endif; ?>
                                                        </h6>
                                                        <small class="text-muted font-monospace fs-11">@<?php echo htmlspecialchars($admin['username']); ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark fs-12"><?php echo htmlspecialchars($admin['email'] ?: 'N/A'); ?></span>
                                            </td>
                                            <td>
                                                <?php if ($admin['role'] === 'super_admin'): ?>
                                                    <span class="badge badge-super-admin px-2.5 py-1 text-uppercase fs-11">
                                                        <i class="ti ti-shield-lock me-1"></i>Super Admin
                                                    </span>
                                                <?php elseif ($admin['role'] === 'moderator'): ?>
                                                    <span class="badge badge-moderator px-2.5 py-1 text-uppercase fs-11">
                                                        <i class="ti ti-shield me-1"></i>Moderator
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-admin px-2.5 py-1 text-uppercase fs-11">
                                                        <i class="ti ti-user-check me-1"></i>Standard Admin
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($admin['status'] === 'active'): ?>
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 fs-11 text-uppercase">
                                                        <i class="ti ti-point me-1"></i>Active
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 fs-11 text-uppercase">
                                                        <i class="ti ti-circle-x me-1"></i>Suspended
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-muted fs-12">
                                                <?php if (!empty($admin['last_login'])): ?>
                                                    <i class="ti ti-clock me-1"></i><?php echo date('M j, Y • H:i', strtotime($admin['last_login'])); ?>
                                                <?php else: ?>
                                                    <span class="text-muted fst-italic">Never logged in</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end pe-3">
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-sm btn-light dropdown-toggle drop-arrow-none" type="button" data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <button class="dropdown-item edit-admin-btn"
                                                                data-id="<?php echo $admin['id']; ?>"
                                                                data-username="<?php echo htmlspecialchars($admin['username']); ?>"
                                                                data-name="<?php echo htmlspecialchars($admin['full_name']); ?>"
                                                                data-email="<?php echo htmlspecialchars($admin['email']); ?>"
                                                                data-role="<?php echo $admin['role']; ?>"
                                                                data-status="<?php echo $admin['status']; ?>"
                                                                data-bs-toggle="modal" data-bs-target="#editAdminModal">
                                                                <i class="ti ti-edit me-1.5 text-primary"></i> Edit Profile & Password
                                                            </button>
                                                        </li>
                                                        <?php if ((int)$admin['id'] !== (int)$_SESSION['admin_id']): ?>
                                                            <li>
                                                                <a class="dropdown-item" href="manage-admins.php?action=toggle_status&id=<?php echo $admin['id']; ?>">
                                                                    <?php if ($admin['status'] === 'active'): ?>
                                                                        <i class="ti ti-player-pause me-1.5 text-warning"></i> Suspend Account
                                                                    <?php else: ?>
                                                                        <i class="ti ti-player-play me-1.5 text-success"></i> Activate Account
                                                                    <?php endif; ?>
                                                                </a>
                                                            </li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li>
                                                                <a class="dropdown-item text-danger" href="manage-admins.php?action=delete&id=<?php echo $admin['id']; ?>" onclick="return confirm('Are you sure you want to permanently delete administrator \'<?php echo htmlspecialchars($admin['username']); ?>\'?');">
                                                                    <i class="ti ti-trash me-1.5"></i> Delete Administrator
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="page-container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        © 2026 Colossus of Lagos. Super Administrator Security Suite.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Lagos State Ministry of Wealth Creation & Employment
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- Create Admin Modal -->
    <div class="modal fade" id="createAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-dark d-flex align-items-center gap-1.5">
                        <i class="ti ti-user-plus text-warning"></i> Create New Administrator
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="manage-admins.php" method="POST">
                    <input type="hidden" name="action" value="create_admin">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Full Name *</label>
                            <input type="text" name="full_name" required class="form-control" placeholder="e.g. Babatunde Sanwo-Olu">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Username *</label>
                            <input type="text" name="username" required class="form-control" placeholder="e.g. babatunde_admin">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Email Address *</label>
                            <input type="email" name="email" required class="form-control" placeholder="e.g. officer@colossusoflagos.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Initial Password *</label>
                            <input type="password" name="password" required class="form-control" placeholder="Enter secure password" minlength="6">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Role Authority *</label>
                            <select name="role" class="form-select" required>
                                <option value="admin" selected>Standard Admin (Applicants, Enquiries, Exports)</option>
                                <option value="super_admin">Super Admin (Full Governance, System Settings, Admins)</option>
                                <option value="moderator">Moderator (Audition Review Only)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning fw-bold">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Admin Modal -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-dark d-flex align-items-center gap-1.5">
                        <i class="ti ti-edit text-primary"></i> Edit Administrator
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="manage-admins.php" method="POST">
                    <input type="hidden" name="action" value="update_admin">
                    <input type="hidden" name="admin_id" id="edit_admin_id">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Username</label>
                            <input type="text" id="edit_username" class="form-control bg-light" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Full Name *</label>
                            <input type="text" name="full_name" id="edit_full_name" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Email Address *</label>
                            <input type="email" name="email" id="edit_email" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Role Authority *</label>
                            <select name="role" id="edit_role" class="form-select" required>
                                <option value="super_admin">Super Admin (Full Authority)</option>
                                <option value="admin">Standard Admin</option>
                                <option value="moderator">Moderator</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Status</label>
                            <select name="status" id="edit_status" class="form-select" required>
                                <option value="active">Active</option>
                                <option value="inactive">Suspended</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-uppercase">Reset Password (leave blank to keep current)</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Enter new password to overwrite" minlength="6">
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fw-bold">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        document.querySelectorAll('.edit-admin-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('edit_admin_id').value = this.dataset.id;
                document.getElementById('edit_username').value = this.dataset.username;
                document.getElementById('edit_full_name').value = this.dataset.name;
                document.getElementById('edit_email').value = this.dataset.email;
                document.getElementById('edit_role').value = this.dataset.role;
                document.getElementById('edit_status').value = this.dataset.status;
            });
        });
    </script>
</body>
</html>
