<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Mark as read/replied action
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action_id = (int)$_GET['id'];
    if ($_GET['action'] === 'mark_read') {
        $pdo->prepare("UPDATE enquiries SET status = 'read' WHERE id = ?")->execute([$action_id]);
    } elseif ($_GET['action'] === 'mark_replied') {
        $pdo->prepare("UPDATE enquiries SET status = 'replied' WHERE id = ?")->execute([$action_id]);
    } elseif ($_GET['action'] === 'delete') {
        $pdo->prepare("DELETE FROM enquiries WHERE id = ?")->execute([$action_id]);
    }
    header("Location: enquiries.php");
    exit();
}

$search = $_GET['search'] ?? '';
$status = $_GET['status'] ?? '';

$query = "SELECT * FROM enquiries WHERE 1=1";
$params = [];

if ($status) {
    $query .= " AND status = ?";
    $params[] = $status;
}
if ($search) {
    $query .= " AND (full_name LIKE ? OR email LIKE ? OR subject LIKE ? OR message LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

$query .= " ORDER BY created_at DESC";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$enquiries = $stmt->fetchAll();

$total_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries")->fetchColumn();
$unread_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'unread'")->fetchColumn();
$replied_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'replied'")->fetchColumn();
$total_applicants = $pdo->query("SELECT COUNT(*) FROM applicants")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Website Enquiries | Colossus of Lagos - Administrative Command</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos Inbound Enquiries" name="description" />

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
        .badge-gold { background: rgba(212, 175, 55, 0.15); color: #d4af37; border: 1px solid rgba(212, 175, 55, 0.3); }
        .logo-img { max-height: 42px; width: auto; object-fit: contain; }
        .enquiry-card-unread {
            border-left: 4px solid var(--bs-warning) !important;
            background-color: rgba(255, 193, 7, 0.03);
        }
    </style>
</head>

<body>
    <!-- Begin page -->
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

            <button class="button-sm-hover"><i class="ti ti-circle align-middle"></i></button>
            <button class="button-close-fullsidebar"><i class="ti ti-x align-middle"></i></button>

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
                            <?php if ($total_applicants > 0): ?>
                                <span class="badge bg-primary rounded-pill"><?php echo $total_applicants; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="enquiries.php" class="side-nav-link active">
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
                    <a href="index.php" class="logo d-flex d-lg-none">
                        <img src="../assets/logos/new/col-logo.png" alt="logo" style="height: 32px;">
                    </a>
                    <button class="sidenav-toggle-button btn btn-secondary btn-icon">
                        <i class="ti ti-menu-deep fs-24"></i>
                    </button>
                    <div class="d-none d-md-flex align-items-center ms-2">
                        <span class="badge badge-gold px-2.5 py-1.5 fw-semibold d-inline-flex align-items-center gap-1">
                            <i class="ti ti-mail fs-14"></i> Website Inbound Messages
                        </span>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <div class="topbar-item">
                        <button class="topbar-link" id="light-dark-mode" type="button" title="Toggle Light/Dark Theme">
                            <i class="ti ti-moon fs-22"></i>
                        </button>
                    </div>

                    <div class="topbar-item d-none d-sm-flex">
                        <a href="../index.php" target="_blank" class="btn btn-sm btn-outline-warning d-inline-flex align-items-center gap-1">
                            <i class="ti ti-world fs-16"></i> Live Website
                        </a>
                    </div>

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
                                <a href="index.php" class="dropdown-item"><i class="ti ti-dashboard me-2"></i><span>Dashboard</span></a>
                                <a href="applicants.php" class="dropdown-item"><i class="ti ti-users me-2"></i><span>Applicants Registry</span></a>
                                <a href="announcements.php" class="dropdown-item"><i class="ti ti-speakerphone me-2"></i><span>Announcements</span></a>
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

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column justify-content-between mb-3">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 text-uppercase fw-bold m-0">Website Enquiries</h4>
                                <p class="text-muted fs-12 mb-0 mt-1">Inbound inquiries, stakeholder questions, and partnership communications</p>
                            </div>
                            <div class="mt-3 mt-sm-0 d-flex align-items-center gap-2">
                                <span class="badge bg-light border text-dark px-3 py-2 fs-12">
                                    <i class="ti ti-calendar text-warning me-1"></i> <?php echo date('F j, Y'); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3 Enquiries Metric Cards -->
                <div class="row row-cols-xxl-3 row-cols-md-3 row-cols-1 mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-muted fs-12 text-uppercase mb-0">Total Enquiries</h5>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-20">
                                            <iconify-icon icon="solar:inbox-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                <h2 class="mb-0 fw-bold mt-2"><?php echo number_format($total_enquiries); ?></h2>
                                <small class="text-muted fs-12">All inbound portal submissions</small>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-muted fs-12 text-uppercase mb-0">Unread Messages</h5>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-20">
                                            <iconify-icon icon="solar:chat-round-unread-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                <h2 class="mb-0 fw-bold text-warning mt-2"><?php echo number_format($unread_enquiries); ?></h2>
                                <small class="text-muted fs-12">Awaiting administrator review</small>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-muted fs-12 text-uppercase mb-0">Replied / Handled</h5>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded-circle fs-20">
                                            <iconify-icon icon="solar:check-circle-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                <h2 class="mb-0 fw-bold text-success mt-2"><?php echo number_format($replied_enquiries); ?></h2>
                                <small class="text-muted fs-12">Resolved communications</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Bar -->
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <form action="enquiries.php" method="GET" class="row g-2 align-items-end">
                            <div class="col-lg-8 col-md-7">
                                <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Search Messages</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="ti ti-search text-muted"></i></span>
                                    <input type="text" name="search" class="form-control" placeholder="Search by sender name, email, subject, or message text..." value="<?php echo htmlspecialchars($search); ?>">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3">
                                <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="unread" <?php if($status==='unread') echo 'selected'; ?>>Unread</option>
                                    <option value="read" <?php if($status==='read') echo 'selected'; ?>>Read</option>
                                    <option value="replied" <?php if($status==='replied') echo 'selected'; ?>>Replied</option>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-2 d-flex gap-2">
                                <button type="submit" class="btn btn-primary w-100 fw-bold">
                                    <i class="ti ti-filter me-1"></i> Filter
                                </button>
                                <a href="enquiries.php" class="btn btn-outline-secondary" title="Reset Filters">
                                    <i class="ti ti-refresh"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Messages Feed -->
                <?php if (empty($enquiries)): ?>
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <iconify-icon icon="solar:inbox-line-bold-duotone" class="fs-48 text-muted mb-2"></iconify-icon>
                            <h5 class="fw-semibold">No enquiries found</h5>
                            <p class="text-muted fs-13 mb-3">There are no messages matching your current filter criteria.</p>
                            <a href="enquiries.php" class="btn btn-sm btn-outline-primary">Clear Filters</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="d-flex flex-column gap-3 mb-4">
                        <?php foreach ($enquiries as $msg): ?>
                            <div class="card <?php echo $msg['status'] === 'unread' ? 'enquiry-card-unread' : ''; ?> mb-0">
                                <div class="card-body p-4">
                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-2 mb-3">
                                        <div>
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <h5 class="card-title fs-15 fw-bold mb-0 text-dark"><?php echo htmlspecialchars($msg['subject']); ?></h5>
                                                <?php if ($msg['status'] === 'unread'): ?>
                                                    <span class="badge bg-warning text-dark fs-10 px-1.5 py-0.5 fw-bold text-uppercase">New</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="fs-12 text-muted">
                                                From: <strong class="text-primary"><?php echo htmlspecialchars($msg['full_name']); ?></strong>
                                                &bull; <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>" class="text-muted text-decoration-none"><?php echo htmlspecialchars($msg['email']); ?></a>
                                                <?php if (!empty($msg['phone'])): ?>
                                                    &bull; <i class="ti ti-phone text-muted me-0.5"></i><?php echo htmlspecialchars($msg['phone']); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="text-md-end">
                                            <?php
                                            if ($msg['status'] === 'unread') {
                                                echo '<span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1 fs-11 fw-semibold text-uppercase"><i class="ti ti-mail-unread me-1"></i>Unread</span>';
                                            } elseif ($msg['status'] === 'replied') {
                                                echo '<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 fs-11 fw-semibold text-uppercase"><i class="ti ti-checks me-1"></i>Replied</span>';
                                            } else {
                                                echo '<span class="badge bg-secondary-subtle text-dark border px-2 py-1 fs-11 fw-semibold text-uppercase"><i class="ti ti-mail-opened me-1"></i>Read</span>';
                                            }
                                            ?>
                                            <div class="fs-11 text-muted mt-1">
                                                <i class="ti ti-clock me-1"></i><?php echo date('M j, Y • H:i', strtotime($msg['created_at'])); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3 bg-light rounded-3 border fs-13 lh-base text-dark mb-3">
                                        <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                                    </div>

                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-2 border-top">
                                        <div class="d-flex flex-wrap gap-2">
                                            <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>?subject=Re: <?php echo urlencode($msg['subject']); ?>" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1">
                                                <i class="ti ti-mail-forward"></i> Reply via Email
                                            </a>

                                            <?php if (!empty($msg['phone'])): ?>
                                                <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $msg['phone']); ?>" target="_blank" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                                    <i class="ti ti-brand-whatsapp"></i> Chat on WhatsApp
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($msg['status'] === 'unread'): ?>
                                                <a href="enquiries.php?action=mark_read&id=<?php echo $msg['id']; ?>" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1">
                                                    <i class="ti ti-check"></i> Mark Read
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($msg['status'] !== 'replied'): ?>
                                                <a href="enquiries.php?action=mark_replied&id=<?php echo $msg['id']; ?>" class="btn btn-sm btn-outline-info d-inline-flex align-items-center gap-1">
                                                    <i class="ti ti-check-double"></i> Mark Replied
                                                </a>
                                            <?php endif; ?>
                                        </div>

                                        <div>
                                            <a href="enquiries.php?action=delete&id=<?php echo $msg['id']; ?>" onclick="return confirm('Are you sure you want to permanently delete this message?');" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1">
                                                <i class="ti ti-trash"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>

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

    </div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>
</html>
