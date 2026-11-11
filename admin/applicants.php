<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Filters
$location = $_GET['location'] ?? '';
$status = $_GET['status'] ?? '';
$search = $_GET['search'] ?? '';

$query = "SELECT * FROM applicants WHERE 1=1";
$params = [];

if ($location) {
    $query .= " AND audition_location = ?";
    $params[] = $location;
}
if ($status) {
    $query .= " AND status = ?";
    $params[] = $status;
}
if ($search) {
    $query .= " AND (full_name LIKE ? OR email LIKE ? OR phone LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

$query .= " ORDER BY created_at DESC";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$applicants = $stmt->fetchAll();

$locations = ['Ikeja', 'Badagry', 'Ikorodu', 'Lagos Island', 'Epe'];
$total_applicants = $pdo->query("SELECT COUNT(*) FROM applicants")->fetchColumn();
$unread_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'unread'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Applicants Registry | Colossus of Lagos - Administrative Command</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos Applicants Registry" name="description" />

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

    <!-- Export Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!-- Custom Brand Touch -->
    <style>
        .badge-gold { background: rgba(212, 175, 55, 0.15); color: #d4af37; border: 1px solid rgba(212, 175, 55, 0.3); }
        .status-badge-pending { background-color: rgba(255, 193, 7, 0.15); color: #b78103; border: 1px solid rgba(255, 193, 7, 0.3); }
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
            <button class="button-sm-hover"><i class="ti ti-circle align-middle"></i></button>

            <!-- Full Sidebar Menu Close Button -->
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
                        <a href="applicants.php" class="side-nav-link active">
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
                    <a href="index.php" class="logo d-flex d-lg-none">
                        <img src="../assets/logos/new/col-logo.png" alt="logo" style="height: 32px;">
                    </a>
                    <button class="sidenav-toggle-button btn btn-secondary btn-icon">
                        <i class="ti ti-menu-deep fs-24"></i>
                    </button>
                    <div class="d-none d-md-flex align-items-center ms-2">
                        <span class="badge badge-gold px-2.5 py-1.5 fw-semibold d-inline-flex align-items-center gap-1">
                            <i class="ti ti-shield-check fs-14"></i> Official Entity Registry
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
                                <a href="enquiries.php" class="dropdown-item"><i class="ti ti-mail me-2"></i><span>Enquiries</span></a>
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

                <!-- Page Title / Breadcrumb Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column justify-content-between mb-3">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 text-uppercase fw-bold m-0">Entity Registry</h4>
                                <p class="text-muted fs-12 mb-0 mt-1">Colossus of Lagos • Complete Applicant Database & Evaluation Records</p>
                            </div>
                            <div class="mt-3 mt-sm-0 d-flex align-items-center gap-2">
                                <span class="badge bg-primary-subtle text-primary border px-3 py-2 fs-12 fw-semibold">
                                    <i class="ti ti-database me-1"></i> <?php echo count($applicants); ?> Records Found
                                </span>
                                <a href="export-excel.php?<?php echo htmlspecialchars($_SERVER['QUERY_STRING'] ?? ''); ?>" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                    <i class="ti ti-file-spreadsheet fs-16"></i> Export Excel
                                </a>
                                <button type="button" onclick="exportToPDF()" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1">
                                    <i class="ti ti-file-pdf fs-16"></i> Export PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Card -->
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <form action="applicants.php" method="GET" class="row g-2 align-items-end">
                            <div class="col-lg-5 col-md-4">
                                <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Search Registry</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="ti ti-search text-muted"></i></span>
                                    <input type="text" name="search" class="form-control" placeholder="Search by name, email, or phone..." value="<?php echo htmlspecialchars($search); ?>">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Audition Hub</label>
                                <select name="location" class="form-select">
                                    <option value="">All Regions & Hubs</option>
                                    <?php foreach ($locations as $loc): ?>
                                        <option value="<?php echo $loc; ?>" <?php if($location == $loc) echo 'selected'; ?>><?php echo $loc; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-3">
                                <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Evaluation Status</label>
                                <select name="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="pending" <?php if($status == 'pending') echo 'selected'; ?>>Pending</option>
                                    <option value="shortlisted" <?php if($status == 'shortlisted') echo 'selected'; ?>>Shortlisted</option>
                                    <option value="rejected" <?php if($status == 'rejected') echo 'selected'; ?>>Rejected</option>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-2 d-flex gap-2">
                                <button type="submit" class="btn btn-primary w-100 fw-bold">
                                    <i class="ti ti-filter me-1"></i> Apply
                                </button>
                                <a href="applicants.php" class="btn btn-outline-secondary" title="Reset Filters">
                                    <i class="ti ti-refresh"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Applicants Registry Table Card -->
                <div class="card">
                    <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="card-title mb-0 fs-15 text-uppercase fw-bold">Candidate Profiles</h4>
                            <span class="badge bg-secondary-subtle text-secondary fs-11">Active Scan</span>
                        </div>
                        <small class="text-muted fs-12">Click Inspect Protocol to view full credentials, documents, and submit status decisions.</small>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-3">Entity & Business</th>
                                        <th>Contact Intel</th>
                                        <th>Location Hub</th>
                                        <th>Status</th>
                                        <th class="text-end pe-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($applicants)): ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-5 text-muted">
                                                <div class="py-4">
                                                    <iconify-icon icon="solar:folder-error-bold-duotone" class="fs-48 text-muted mb-2"></iconify-icon>
                                                    <h5 class="fw-semibold">No records match your scan parameters.</h5>
                                                    <p class="text-muted fs-13">Try clearing search terms or resetting filters to scan the full registry.</p>
                                                    <a href="applicants.php" class="btn btn-sm btn-outline-primary mt-1">Reset Filters</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($applicants as $applicant): ?>
                                            <tr>
                                                <td class="ps-3">
                                                    <div class="d-flex align-items-center gap-2.5">
                                                        <div class="avatar-md flex-shrink-0" style="width: 44px; height: 44px;">
                                                            <?php if (!empty($applicant['profile_picture']) && file_exists('../uploads/' . $applicant['profile_picture'])): ?>
                                                                <img src="../uploads/<?php echo htmlspecialchars($applicant['profile_picture']); ?>" alt="Profile" class="w-100 h-100 rounded-circle object-fit-cover border">
                                                            <?php else: ?>
                                                                <span class="avatar-title bg-primary-subtle text-primary rounded-circle fw-bold fs-14">
                                                                    <?php echo strtoupper(substr($applicant['full_name'], 0, 1)); ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div>
                                                            <div class="d-flex align-items-center gap-1.5">
                                                                <h6 class="fs-13 mb-0 fw-bold"><?php echo htmlspecialchars($applicant['full_name']); ?></h6>
                                                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle fs-10 px-1.5 py-0.5">
                                                                    <?php echo htmlspecialchars($applicant['reference_number'] ?? ('LNCC-2026-'.$applicant['id'])); ?>
                                                                </span>
                                                            </div>
                                                            <div class="fs-12 text-muted mt-0.5">
                                                                <?php if (!empty($applicant['business_name'])): ?>
                                                                    <strong class="text-secondary"><?php echo htmlspecialchars($applicant['business_name']); ?></strong>
                                                                <?php endif; ?>
                                                                <span class="text-muted">&bull; <?php echo htmlspecialchars($applicant['email']); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fs-12 fw-semibold text-dark">
                                                        <i class="ti ti-phone text-muted me-1"></i><?php echo htmlspecialchars($applicant['phone']); ?>
                                                    </div>
                                                    <small class="text-muted fs-11">Reg: <?php echo date('M j, Y • H:i', strtotime($applicant['created_at'])); ?></small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary-subtle text-dark border px-2 py-1 fs-11">
                                                        <i class="ti ti-map-pin me-1 text-warning"></i><?php echo htmlspecialchars($applicant['audition_location']); ?>
                                                    </span>
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
                        <small class="text-muted fs-12">Total matching records: <strong><?php echo count($applicants); ?></strong> candidate(s)</small>
                        <small class="text-muted fs-12">Colossus of Lagos Season 1 Official Evaluator Portal</small>
                    </div>
                </div>

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

    <!-- Hidden Report for PDF Export -->
    <div id="full-report-content" style="display: none; background: #fff; color: #000; padding: 40px; font-family: sans-serif;">
        <h1 style="text-align: center; color: #1a4fbb; margin-bottom: 10px;">COLOSSUS OF LAGOS | ENTITY REGISTRY REPORT</h1>
        <p style="text-align: center; font-size: 0.85rem; color: #666; margin-bottom: 30px;">Report Generated: <?php echo date('F j, Y, g:i a'); ?> &bull; Filtered Count: <?php echo count($applicants); ?> Entries</p>
        
        <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
            <thead>
                <tr style="background: #f4f4f4;">
                    <th style="border: 1px solid #ddd; padding: 8px;">REF / ID</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">FULL NAME / BUSINESS</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">EMAIL / PHONE</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">LOCATION</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">VITAL STATS</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">ADDRESS / LASRRA</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applicants as $row): ?>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;"><?php echo htmlspecialchars($row['reference_number'] ?? ('#'.str_pad($row['id'], 4, '0', STR_PAD_LEFT))); ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">
                            <?php echo htmlspecialchars($row['full_name']); ?><br>
                            <small style="color: #666;"><?php echo htmlspecialchars($row['business_name'] ?? ''); ?></small>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <?php echo htmlspecialchars($row['email']); ?><br>
                            <?php echo htmlspecialchars($row['phone']); ?>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo htmlspecialchars($row['audition_location']); ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            Gen: <?php echo htmlspecialchars($row['gender']); ?><br>
                            DOB: <?php echo $row['dob']; ?>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <?php echo htmlspecialchars($row['address']); ?><br>
                            LASRRA: <?php echo htmlspecialchars($row['lasrra_number'] ?: 'N/A'); ?>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;"><?php echo strtoupper($row['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- PDF Export Script -->
    <script>
        function exportToPDF() {
            const element = document.getElementById("full-report-content");
            element.style.display = "block";
            
            const opt = {
                margin:       [0.3, 0.3],
                filename:     'Colossus_Registry_Report.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, backgroundColor: '#ffffff' },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'landscape' }
            };
            
            html2pdf().set(opt).from(element).toPdf().get('pdf').then(function (pdf) {
                element.style.display = "none";
            }).save();
        }
    </script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>
</html>
