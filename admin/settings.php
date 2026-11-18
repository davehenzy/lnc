<?php
session_start();
require_once '../config.php';

require_super_admin();

$msg = $_GET['msg'] ?? '';
$err = $_GET['err'] ?? '';

// Handle Settings Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_settings'])) {
    $settings_to_update = [
        'registration_status' => $_POST['registration_status'] ?? 'open',
        'registration_closed_message' => trim($_POST['registration_closed_message'] ?? 'Online registrations for Colossus of Lagos Season 1 are currently paused.'),
        'competition_season' => trim($_POST['competition_season'] ?? 'Season 1 (2026)'),
        'grand_prize' => trim($_POST['grand_prize'] ?? '₦30,000,000'),
        'bootcamp_slots' => trim($_POST['bootcamp_slots'] ?? '30'),
        'island_hub_name' => trim($_POST['island_hub_name'] ?? 'Lagos Island Audition Centre'),
        'mainland_hub_name' => trim($_POST['mainland_hub_name'] ?? 'Lagos Mainland Audition Centre'),
        'contact_email' => trim($_POST['contact_email'] ?? 'info@colossusoflagos.com'),
        'whatsapp_number' => trim($_POST['whatsapp_number'] ?? '2348123456789'),
        'maintenance_mode' => isset($_POST['maintenance_mode']) ? '1' : '0'
    ];

    $stmt = $pdo->prepare("INSERT INTO system_settings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)");
    foreach ($settings_to_update as $key => $val) {
        $stmt->execute([$key, $val]);
    }

    log_audit_action($pdo, 'Update System Settings', "Super Admin updated platform configuration and competition parameters.");

    header("Location: settings.php?msg=" . urlencode("Platform settings successfully updated."));
    exit();
}

// Fetch current settings
$stmt = $pdo->query("SELECT setting_key, setting_value FROM system_settings");
$current_settings = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

function get_setting($key, $default = '', $settings = []) {
    return $settings[$key] ?? $default;
}

$unread_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'unread'")->fetchColumn();
$total_admins = $pdo->query("SELECT COUNT(*) FROM admins")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>System Settings | Colossus of Lagos - Super Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos System Settings" name="description" />

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
                        <a href="settings.php" class="side-nav-link active">
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
                            <i class="ti ti-adjustments text-warning"></i> Platform & Competition Governance
                        </h4>
                        <p class="text-muted fs-12 mb-0 mt-1">Global parameters, registration gating, prize values, and system health</p>
                    </div>
                </div>

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

                <form action="settings.php" method="POST">
                    <input type="hidden" name="save_settings" value="1">
                    <div class="row g-4">

                        <!-- Left Column: Core Parameters -->
                        <div class="col-lg-8">

                            <!-- Registration Gating Card -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-header border-bottom border-dashed py-3">
                                    <h5 class="card-title mb-0 fs-15 text-uppercase fw-bold d-flex align-items-center gap-2">
                                        <i class="ti ti-door-enter text-primary"></i> Registration Portal Controls
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fs-12 fw-bold text-uppercase">Registration Status *</label>
                                            <?php $reg_status = get_setting('registration_status', 'open', $current_settings); ?>
                                            <select name="registration_status" class="form-select">
                                                <option value="open" <?php if($reg_status === 'open') echo 'selected'; ?>>Open (Public Submissions Active)</option>
                                                <option value="paused" <?php if($reg_status === 'paused') echo 'selected'; ?>>Paused (Temporary Hold)</option>
                                                <option value="closed" <?php if($reg_status === 'closed') echo 'selected'; ?>>Closed (Cycle Concluded)</option>
                                            </select>
                                            <small class="text-muted fs-11">Controls whether the public registration form accepts new entries.</small>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fs-12 fw-bold text-uppercase">Competition Edition / Season</label>
                                            <input type="text" name="competition_season" class="form-control" value="<?php echo htmlspecialchars(get_setting('competition_season', 'Season 1 (2026)', $current_settings)); ?>">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fs-12 fw-bold text-uppercase">Public Notice / Status Message</label>
                                            <textarea name="registration_closed_message" class="form-control" rows="2"><?php echo htmlspecialchars(get_setting('registration_closed_message', 'Online registrations for Colossus of Lagos Season 1 are currently active.', $current_settings)); ?></textarea>
                                            <small class="text-muted fs-11">Displayed to visitors when registration is paused or closed.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Competition Economics & Hubs -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-header border-bottom border-dashed py-3">
                                    <h5 class="card-title mb-0 fs-15 text-uppercase fw-bold d-flex align-items-center gap-2">
                                        <i class="ti ti-trophy text-warning"></i> Competition Economics & Audition Hubs
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fs-12 fw-bold text-uppercase">Grand Prize Value</label>
                                            <input type="text" name="grand_prize" class="form-control" value="<?php echo htmlspecialchars(get_setting('grand_prize', '₦30,000,000', $current_settings)); ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fs-12 fw-bold text-uppercase">Bootcamp Winner Slots</label>
                                            <input type="number" name="bootcamp_slots" class="form-control" value="<?php echo htmlspecialchars(get_setting('bootcamp_slots', '30', $current_settings)); ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fs-12 fw-bold text-uppercase">Island Audition Hub Label</label>
                                            <input type="text" name="island_hub_name" class="form-control" value="<?php echo htmlspecialchars(get_setting('island_hub_name', 'Lagos Island Audition Centre', $current_settings)); ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fs-12 fw-bold text-uppercase">Mainland Audition Hub Label</label>
                                            <input type="text" name="mainland_hub_name" class="form-control" value="<?php echo htmlspecialchars(get_setting('mainland_hub_name', 'Lagos Mainland Audition Centre', $current_settings)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Support & Channels -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-header border-bottom border-dashed py-3">
                                    <h5 class="card-title mb-0 fs-15 text-uppercase fw-bold d-flex align-items-center gap-2">
                                        <i class="ti ti-headset text-info"></i> Support & Communication Desks
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fs-12 fw-bold text-uppercase">Official Support Email</label>
                                            <input type="email" name="contact_email" class="form-control" value="<?php echo htmlspecialchars(get_setting('contact_email', 'info@colossusoflagos.com', $current_settings)); ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fs-12 fw-bold text-uppercase">WhatsApp Hotline (Digits Only with Country Code)</label>
                                            <input type="text" name="whatsapp_number" class="form-control" value="<?php echo htmlspecialchars(get_setting('whatsapp_number', '2348123456789', $current_settings)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning px-4 py-2.5 fw-bold shadow-sm d-flex align-items-center gap-2">
                                    <i class="ti ti-device-floppy fs-18"></i>
                                    <span>Save All System Settings</span>
                                </button>
                            </div>

                        </div>

                        <!-- Right Column: System Diagnostics & Emergency Actions -->
                        <div class="col-lg-4">

                            <!-- Emergency Mode Card -->
                            <div class="card shadow-sm mb-4 border-start border-3 border-danger">
                                <div class="card-header border-bottom border-dashed py-3">
                                    <h5 class="card-title mb-0 fs-15 text-uppercase fw-bold text-danger d-flex align-items-center gap-2">
                                        <i class="ti ti-alert-triangle"></i> Maintenance Mode
                                    </h5>
                                </div>
                                <div class="card-body p-3">
                                    <p class="fs-12 text-muted mb-3">When activated, public access displays a temporary maintenance notice while administrators retain full dashboard access.</p>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" name="maintenance_mode" id="maintenance_mode" value="1" <?php if(get_setting('maintenance_mode', '0', $current_settings) === '1') echo 'checked'; ?>>
                                        <label class="form-check-label fw-bold fs-13" for="maintenance_mode">Enable Maintenance Mode</label>
                                    </div>
                                </div>
                            </div>

                            <!-- System Health & Environment Card -->
                            <div class="card shadow-sm">
                                <div class="card-header border-bottom border-dashed py-3">
                                    <h5 class="card-title mb-0 fs-15 text-uppercase fw-bold d-flex align-items-center gap-2">
                                        <i class="ti ti-server text-secondary"></i> System Diagnostics
                                    </h5>
                                </div>
                                <div class="card-body p-3 fs-12">
                                    <ul class="list-unstyled mb-0 space-y-2">
                                        <li class="d-flex justify-content-between py-1 border-bottom">
                                            <span class="text-muted">PHP Engine:</span>
                                            <span class="fw-semibold text-dark"><?php echo PHP_VERSION; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between py-1 border-bottom">
                                            <span class="text-muted">Database Engine:</span>
                                            <span class="fw-semibold text-dark">MySQL / MariaDB</span>
                                        </li>
                                        <li class="d-flex justify-content-between py-1 border-bottom">
                                            <span class="text-muted">Uploads Directory:</span>
                                            <span class="badge bg-success-subtle text-success">Writable</span>
                                        </li>
                                        <li class="d-flex justify-content-between py-1 border-bottom">
                                            <span class="text-muted">Active Session Role:</span>
                                            <span class="badge badge-super-admin">Super Admin</span>
                                        </li>
                                        <li class="d-flex justify-content-between py-1">
                                            <span class="text-muted">Database Name:</span>
                                            <span class="fw-bold font-monospace"><?php echo DB_NAME; ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>

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
