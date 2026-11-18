<?php
session_start();
require_once '../config.php';

require_super_admin();

$filter_action = $_GET['action_filter'] ?? '';
$search = $_GET['search'] ?? '';

$query = "SELECT * FROM audit_logs WHERE 1=1";
$params = [];

if ($filter_action) {
    $query .= " AND action = ?";
    $params[] = $filter_action;
}
if ($search) {
    $query .= " AND (admin_username LIKE ? OR details LIKE ? OR ip_address LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

$query .= " ORDER BY created_at DESC LIMIT 200";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Distinct actions for filter
$distinct_actions = $pdo->query("SELECT DISTINCT action FROM audit_logs ORDER BY action ASC")->fetchAll(PDO::FETCH_COLUMN);

$total_logs = $pdo->query("SELECT COUNT(*) FROM audit_logs")->fetchColumn();
$unread_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'unread'")->fetchColumn();
$total_admins = $pdo->query("SELECT COUNT(*) FROM admins")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Security Audit Logs | Colossus of Lagos - Super Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos Security Audit Logs" name="description" />

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
                        <a href="manage-admins.php" class="side-nav-link">
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
                        <a href="audit-logs.php" class="side-nav-link active">
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
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" type="button">
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

        <!-- Page Content -->
        <div class="page-content">
            <div class="page-container">

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 my-4">
                    <div>
                        <h4 class="fs-18 text-uppercase fw-bold m-0 d-flex align-items-center gap-2">
                            <i class="ti ti-history text-warning"></i> Security Audit Trail
                        </h4>
                        <p class="text-muted fs-12 mb-0 mt-1">Chronological record of administrative authentications, settings adjustments, and data exports</p>
                    </div>
                </div>

                <!-- Filters Card -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body p-3">
                        <form action="audit-logs.php" method="GET" class="row g-2 align-items-end">
                            <div class="col-lg-6 col-md-5">
                                <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Search Logs</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="ti ti-search text-muted"></i></span>
                                    <input type="text" name="search" class="form-control" placeholder="Search by username, IP, or details..." value="<?php echo htmlspecialchars($search); ?>">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Action Type</label>
                                <select name="action_filter" class="form-select">
                                    <option value="">All Security Events</option>
                                    <?php foreach ($distinct_actions as $act): ?>
                                        <option value="<?php echo htmlspecialchars($act); ?>" <?php if($filter_action === $act) echo 'selected'; ?>><?php echo htmlspecialchars($act); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-3 d-flex gap-2">
                                <button type="submit" class="btn btn-primary w-100 fw-bold">
                                    <i class="ti ti-filter me-1"></i> Filter
                                </button>
                                <a href="audit-logs.php" class="btn btn-outline-secondary" title="Reset Filters">
                                    <i class="ti ti-refresh"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Audit Logs Table -->
                <div class="card shadow-sm">
                    <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="card-title mb-0 fs-15 text-uppercase fw-bold">Logged Events</h4>
                            <span class="badge bg-secondary-subtle text-secondary fs-11"><?php echo count($logs); ?> Shown</span>
                        </div>
                        <small class="text-muted fs-12">Recorded automatically for compliance and system security.</small>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-3">Timestamp</th>
                                        <th>Administrator</th>
                                        <th>Action</th>
                                        <th>Details</th>
                                        <th class="pe-3">IP Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($logs)): ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-5 text-muted">
                                                <div class="py-4">
                                                    <iconify-icon icon="solar:history-bold-duotone" class="fs-48 text-muted mb-2"></iconify-icon>
                                                    <h5 class="fw-semibold">No audit records found</h5>
                                                    <p class="text-muted fs-13">Events will be logged automatically as administrators perform actions.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($logs as $log): ?>
                                            <tr>
                                                <td class="ps-3 text-nowrap">
                                                    <div class="fs-12 fw-semibold text-dark">
                                                        <i class="ti ti-calendar-event me-1 text-muted"></i><?php echo date('M j, Y', strtotime($log['created_at'])); ?>
                                                    </div>
                                                    <small class="text-muted font-monospace fs-11"><?php echo date('H:i:s', strtotime($log['created_at'])); ?></small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="avatar-title bg-light text-dark border rounded-circle fw-bold fs-11" style="width: 28px; height: 28px; display: inline-flex; align-items: center; justify-content: center;">
                                                            <?php echo strtoupper(substr($log['admin_username'] ?: 'SY', 0, 2)); ?>
                                                        </span>
                                                        <span class="fw-bold fs-13 text-dark"><?php echo htmlspecialchars($log['admin_username'] ?: 'System'); ?></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 fs-11 fw-semibold">
                                                        <?php echo htmlspecialchars($log['action']); ?>
                                                    </span>
                                                </td>
                                                <td class="fs-12 text-muted">
                                                    <?php echo htmlspecialchars($log['details'] ?: 'No details recorded'); ?>
                                                </td>
                                                <td class="pe-3 font-monospace fs-11 text-muted">
                                                    <?php echo htmlspecialchars($log['ip_address'] ?: '127.0.0.1'); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
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

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
