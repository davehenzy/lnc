<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Fetch Stats
$total_applicants = $pdo->query("SELECT COUNT(*) FROM applicants")->fetchColumn();
$pending_applicants = $pdo->query("SELECT COUNT(*) FROM applicants WHERE status = 'pending'")->fetchColumn();
$shortlisted_applicants = $pdo->query("SELECT COUNT(*) FROM applicants WHERE status = 'shortlisted'")->fetchColumn();
$unread_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'unread'")->fetchColumn();

// Recent Applicants
$recent_applicants = $pdo->query("SELECT * FROM applicants ORDER BY created_at DESC LIMIT 5")->fetchAll();

// Additional summary queries for Boron dashboard widgets
$total_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Colossus of Lagos - Administrative Command</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos Administrative Dashboard" name="description" />

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

    <!-- Custom Brand Touch -->
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
        .badge-gold { background: rgba(212, 175, 55, 0.15); color: #f5c518; border: 1px solid rgba(212, 175, 55, 0.3); }
        .status-badge-pending { background-color: rgba(255, 193, 7, 0.15); color: #ffc107; border: 1px solid rgba(255, 193, 7, 0.3); }
        .status-badge-shortlisted { background-color: rgba(40, 167, 69, 0.15); color: #28a745; border: 1px solid rgba(40, 167, 69, 0.3); }
        .status-badge-rejected { background-color: rgba(220, 53, 69, 0.15); color: #dc3545; border: 1px solid rgba(220, 53, 69, 0.3); }
        .logo-img { max-height: 42px; width: auto; object-fit: contain; }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu">

            <!-- Brand Logo -->
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

            <!-- Sidebar Hover Menu Toggle Button -->
            <button class="button-sm-hover">
                <i class="ti ti-circle align-middle"></i>
            </button>

            <!-- Full Sidebar Menu Close Button -->
            <button class="button-close-fullsidebar">
                <i class="ti ti-x align-middle"></i>
            </button>

            <div data-simplebar>

                <!--- Sidenav Menu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Navigation</li>

                    <li class="side-nav-item">
                        <a href="index.php" class="side-nav-link active">
                            <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="applicants.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-users"></i></span>
                            <span class="menu-text"> Applicants </span>
                            <?php if ($total_applicants > 0): ?>
                                <span class="badge bg-primary rounded-pill"><?php echo $total_applicants; ?></span>
                            <?php endif; ?>
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

                    <li class="side-nav-item">
                        <a href="announcements.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-speakerphone"></i></span>
                            <span class="menu-text"> Announcements </span>
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

                    <li class="side-nav-item">
                        <a href="logout.php" class="side-nav-link text-danger">
                            <span class="menu-icon"><i class="ti ti-logout text-danger"></i></span>
                            <span class="menu-text text-danger"> Logout </span>
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

                    <!-- Brand Logo for Mobile -->
                    <a href="index.php" class="logo d-flex d-lg-none">
                        <img src="../assets/logos/new/col-logo.png" alt="logo" style="height: 32px;">
                    </a>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button btn btn-secondary btn-icon">
                        <i class="ti ti-menu-deep fs-24"></i>
                    </button>

                    <div class="d-none d-md-flex align-items-center ms-2">
                        <span class="badge badge-gold px-2.5 py-1.5 fw-semibold d-inline-flex align-items-center gap-1">
                            <i class="ti ti-shield-check fs-14"></i> Official Administration Gateway
                        </span>
                    </div>

                </div>

                <div class="d-flex align-items-center gap-2">

                    <!-- Theme Mode Toggle -->
                    <div class="topbar-item">
                        <button class="topbar-link" id="light-dark-mode" type="button" title="Toggle Light/Dark Theme">
                            <i class="ti ti-moon fs-22"></i>
                        </button>
                    </div>

                    <!-- Quick Live Site Link -->
                    <div class="topbar-item d-none d-sm-flex">
                        <a href="../index.php" target="_blank" class="btn btn-sm btn-outline-warning d-inline-flex align-items-center gap-1">
                            <i class="ti ti-world fs-16"></i> Live Website
                        </a>
                    </div>

                    <!-- Admin User Dropdown -->
                    <div class="topbar-item">
                        <div class="dropdown">
                            <a class="topbar-link btn btn-link px-2 dropdown-toggle drop-arrow-none d-flex align-items-center gap-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="avatar-title bg-warning text-dark rounded-circle fw-bold d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; font-size: 14px;">
                                    AD
                                </span>
                                <div class="d-none d-lg-block text-start">
                                    <span class="d-block fw-semibold fs-13 lh-1">Administrator</span>
                                    <small class="text-muted fs-11">Colossus Command</small>
                                </div>
                                <i class="ti ti-chevron-down fs-14 d-none d-sm-inline-block"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Colossus Administrator</h6>
                                </div>
                                <a href="applicants.php" class="dropdown-item">
                                    <i class="ti ti-users me-2"></i>
                                    <span>Applicants Registry</span>
                                </a>
                                <a href="enquiries.php" class="dropdown-item">
                                    <i class="ti ti-mail me-2"></i>
                                    <span>Messages & Enquiries</span>
                                </a>
                                <a href="announcements.php" class="dropdown-item">
                                    <i class="ti ti-speakerphone me-2"></i>
                                    <span>Announcements</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item text-danger">
                                    <i class="ti ti-logout me-2"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- Topbar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">
            <div class="page-container">

                <!-- Page Title / Breadcrumb Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column justify-content-between mb-3">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 text-uppercase fw-bold m-0">System Overview</h4>
                                <p class="text-muted fs-12 mb-0 mt-1">Colossus of Lagos • Central Administrative & Evaluation Command</p>
                            </div>
                            <div class="mt-3 mt-sm-0 d-flex align-items-center gap-2">
                                <span class="badge bg-light border border-secondary-subtle text-dark px-3 py-2 fs-12 d-inline-flex align-items-center gap-1.5">
                                    <i class="ti ti-calendar text-warning"></i> <?php echo date('F j, Y'); ?>
                                </span>
                                <a href="export-excel.php" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                    <i class="ti ti-file-spreadsheet fs-16"></i> Export Data
                                </a>
                                <a href="applicants.php" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1">
                                    <i class="ti ti-users fs-16"></i> View Applicants
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 Golden Stat Cards (Boron Neubrutalism Card Layout) -->
                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1 mb-3">

                    <!-- Total Applicants Card -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-muted fs-12 text-uppercase mb-0">Total Applicants</h5>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-20">
                                            <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline gap-2 my-2">
                                    <h2 class="mb-0 fw-bold"><?php echo number_format($total_applicants); ?></h2>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted fs-12">
                                    <span>All Registered Entities</span>
                                    <a href="applicants.php" class="text-primary fw-semibold text-decoration-none">Explore &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Awaiting Review Card -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-muted fs-12 text-uppercase mb-0">Awaiting Review</h5>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-20">
                                            <iconify-icon icon="solar:clock-circle-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline gap-2 my-2">
                                    <h2 class="mb-0 fw-bold text-warning"><?php echo number_format($pending_applicants); ?></h2>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted fs-12">
                                    <span>Pending Crucible Verification</span>
                                    <a href="applicants.php?status=pending" class="text-warning fw-semibold text-decoration-none">Review &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shortlisted Champions Card -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-muted fs-12 text-uppercase mb-0">Shortlisted</h5>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded-circle fs-20">
                                            <iconify-icon icon="solar:cup-star-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline gap-2 my-2">
                                    <h2 class="mb-0 fw-bold text-success"><?php echo number_format($shortlisted_applicants); ?></h2>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted fs-12">
                                    <span>Qualified Candidates</span>
                                    <a href="applicants.php?status=shortlisted" class="text-success fw-semibold text-decoration-none">Inspect &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- New Enquiries Card -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-muted fs-12 text-uppercase mb-0">New Enquiries</h5>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded-circle fs-20">
                                            <iconify-icon icon="solar:chat-round-dots-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline gap-2 my-2">
                                    <h2 class="mb-0 fw-bold text-info"><?php echo number_format($unread_enquiries); ?></h2>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted fs-12">
                                    <span>Unread Inbound Messages</span>
                                    <a href="enquiries.php" class="text-info fw-semibold text-decoration-none">Open Inbox &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Main Content Row: Recent Applicants (8 cols) + Quick Actions & Platform Info (4 cols) -->
                <div class="row">

                    <!-- Left: Recent Applicants Table -->
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <h4 class="card-title mb-0 fs-15 text-uppercase fw-bold">Recent Registrations</h4>
                                    <span class="badge bg-primary-subtle text-primary fs-11">Latest 5</span>
                                </div>
                                <a href="applicants.php" class="btn btn-sm btn-subtle-primary d-inline-flex align-items-center gap-1">
                                    <span>View All Protocols</span>
                                    <i class="ti ti-arrow-right"></i>
                                </a>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0 align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="ps-3">Entity Name</th>
                                                <th>Location</th>
                                                <th>Timestamp</th>
                                                <th>Status</th>
                                                <th class="text-end pe-3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($recent_applicants)): ?>
                                                <tr>
                                                    <td colspan="5" class="text-center py-5 text-muted">
                                                        <div class="py-3">
                                                            <iconify-icon icon="solar:user-block-rounded-bold-duotone" class="fs-48 text-muted mb-2"></iconify-icon>
                                                            <h5 class="fw-semibold">No entities registered in the crucible yet.</h5>
                                                            <p class="text-muted fs-13">New registrations from the public portal will appear here in real time.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php foreach ($recent_applicants as $applicant): ?>
                                                    <tr>
                                                        <td class="ps-3">
                                                            <div class="d-flex align-items-center gap-2.5">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fw-bold fs-13">
                                                                        <?php echo strtoupper(substr($applicant['full_name'], 0, 1)); ?>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <h6 class="fs-13 mb-0 fw-bold"><?php echo htmlspecialchars($applicant['full_name']); ?></h6>
                                                                    <?php if (!empty($applicant['business_name'])): ?>
                                                                        <small class="text-muted fs-11"><?php echo htmlspecialchars($applicant['business_name']); ?></small>
                                                                    <?php else: ?>
                                                                        <small class="text-muted fs-11"><?php echo htmlspecialchars($applicant['email'] ?? ''); ?></small>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-secondary-subtle text-dark border px-2 py-1 fs-11">
                                                                <i class="ti ti-map-pin me-1 text-warning"></i><?php echo htmlspecialchars($applicant['audition_location']); ?>
                                                            </span>
                                                        </td>
                                                        <td class="text-muted fs-12">
                                                            <i class="ti ti-clock me-1 fs-12"></i><?php echo date('M j, H:i', strtotime($applicant['created_at'])); ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $st = strtolower($applicant['status'] ?? 'pending');
                                                            if ($st === 'shortlisted') {
                                                                echo '<span class="badge status-badge-shortlisted px-2.5 py-1 fs-11 fw-semibold text-uppercase"><i class="ti ti-check me-1"></i>Shortlisted</span>';
                                                            } elseif ($st === 'rejected') {
                                                                echo '<span class="badge status-badge-rejected px-2.5 py-1 fs-11 fw-semibold text-uppercase"><i class="ti ti-x me-1"></i>Rejected</span>';
                                                            } else {
                                                                echo '<span class="badge status-badge-pending px-2.5 py-1 fs-11 fw-semibold text-uppercase"><i class="ti ti-clock me-1"></i>Pending</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-end pe-3">
                                                            <a href="view-applicant.php?id=<?php echo $applicant['id']; ?>" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                                                <span>INSPECT</span>
                                                                <i class="ti ti-chevron-right fs-12"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-footer border-top border-dashed py-2.5 px-3 d-flex align-items-center justify-content-between">
                                <small class="text-muted fs-12">Showing latest 5 entries from registration pipeline</small>
                                <a href="applicants.php" class="fs-12 text-primary fw-semibold text-decoration-none">View full applicant table &rarr;</a>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Quick Operations & Platform Status -->
                    <div class="col-xl-4">

                        <!-- Quick Operations Card -->
                        <div class="card mb-3">
                            <div class="card-header border-bottom border-dashed py-3">
                                <h4 class="card-title mb-0 fs-15 text-uppercase fw-bold">Quick Protocols</h4>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-grid gap-2">
                                    <a href="applicants.php" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between p-2.5">
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="ti ti-users fs-18 text-primary"></i>
                                            <span class="fs-13 fw-semibold">Manage All Applicants</span>
                                        </span>
                                        <i class="ti ti-chevron-right text-muted"></i>
                                    </a>

                                    <a href="enquiries.php" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between p-2.5">
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="ti ti-mail fs-18 text-info"></i>
                                            <span class="fs-13 fw-semibold">Inbound Enquiries</span>
                                        </span>
                                        <?php if ($unread_enquiries > 0): ?>
                                            <span class="badge bg-danger rounded-pill"><?php echo $unread_enquiries; ?></span>
                                        <?php else: ?>
                                            <i class="ti ti-chevron-right text-muted"></i>
                                        <?php endif; ?>
                                    </a>

                                    <a href="announcements.php" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between p-2.5">
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="ti ti-speakerphone fs-18 text-warning"></i>
                                            <span class="fs-13 fw-semibold">Publish Announcement</span>
                                        </span>
                                        <i class="ti ti-chevron-right text-muted"></i>
                                    </a>

                                    <a href="export-excel.php" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between p-2.5">
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="ti ti-file-spreadsheet fs-18 text-success"></i>
                                            <span class="fs-13 fw-semibold">Export Registry to Excel</span>
                                        </span>
                                        <i class="ti ti-download text-muted"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Platform Overview Card -->
                        <div class="card">
                            <div class="card-header border-bottom border-dashed py-3">
                                <h4 class="card-title mb-0 fs-15 text-uppercase fw-bold">Platform Status</h4>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-3 mb-3 p-2.5 rounded bg-light border">
                                    <img src="../assets/proposal/lagos_seal.png" alt="Lagos State Seal" style="width: 38px; height: 38px; object-fit: contain;">
                                    <div>
                                        <h6 class="fs-12 fw-bold mb-0 text-dark">Lagos State Government</h6>
                                        <small class="text-muted fs-11">Official Major Partner & Endorser</small>
                                    </div>
                                </div>
                                <p class="fs-12 text-muted lh-base mb-3">
                                    Colossus of Lagos is Africa's premier youth entrepreneurship championship and convention.
                                </p>
                                <div class="d-flex justify-content-between align-items-center pt-2 border-top fs-12 text-muted">
                                    <span>System Gateway:</span>
                                    <span class="badge bg-success-subtle text-success fw-semibold"><i class="ti ti-point-filled"></i> Active</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="page-container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        &copy; <?php echo date('Y'); ?> <strong class="text-warning">Colossus of Lagos</strong>. In Official Partnership with Lagos State Government.
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="../about.php" target="_blank">About Show</a>
                            <a href="../eligibility.php" target="_blank">Eligibility</a>
                            <a href="../faq.php" target="_blank">FAQ</a>
                            <a href="../index.php" target="_blank">Public Portal</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>
</html>
