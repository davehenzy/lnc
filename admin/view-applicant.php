<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM applicants WHERE id = ?");
$stmt->execute([$id]);
$applicant = $stmt->fetch();

if (!$applicant) {
    die("ENTITY NOT FOUND IN ARCHIVES.");
}

// Handle Status Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $new_status = $_POST['status'];
    $stmt = $pdo->prepare("UPDATE applicants SET status = ? WHERE id = ?");
    $stmt->execute([$new_status, $id]);
    header("Location: view-applicant.php?id=$id&updated=1");
    exit();
}

$total_applicants = $pdo->query("SELECT COUNT(*) FROM applicants")->fetchColumn();
$unread_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'unread'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Inspect Applicant #<?php echo $applicant['id']; ?> | Colossus of Lagos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos Applicant Detailed Dossier" name="description" />

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

    <!-- PDF Generation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        .badge-gold { background: rgba(212, 175, 55, 0.15); color: #d4af37; border: 1px solid rgba(212, 175, 55, 0.3); }
        .status-badge-pending { background-color: rgba(255, 193, 7, 0.15); color: #b78103; border: 1px solid rgba(255, 193, 7, 0.3); }
        .status-badge-shortlisted { background-color: rgba(40, 167, 69, 0.15); color: #28a745; border: 1px solid rgba(40, 167, 69, 0.3); }
        .status-badge-rejected { background-color: rgba(220, 53, 69, 0.15); color: #dc3545; border: 1px solid rgba(220, 53, 69, 0.3); }
        .logo-img { max-height: 42px; width: auto; object-fit: contain; }
        .doc-card {
            border: 1px solid var(--bs-border-color);
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .doc-card:hover {
            border-color: var(--bs-primary);
            background-color: var(--bs-primary-subtle);
            color: var(--bs-primary);
        }
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
                            <i class="ti ti-id fs-14"></i> Candidate Dossier #<?php echo $applicant['id']; ?>
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
                                <a href="enquiries.php" class="dropdown-item"><i class="ti ti-mail me-2"></i><span>Enquiries</span></a>
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

                <!-- Page Title / Action Header -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column justify-content-between mb-3">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 text-uppercase fw-bold m-0"><?php echo htmlspecialchars($applicant['full_name']); ?></h4>
                                <p class="text-muted fs-12 mb-0 mt-1">
                                    REF: <strong class="text-warning"><?php echo htmlspecialchars($applicant['reference_number'] ?? ('LNCC-2026-'.$applicant['id'])); ?></strong>
                                    &bull; Candidate ID: #<?php echo str_pad($applicant['id'], 4, '0', STR_PAD_LEFT); ?>
                                    &bull; Submitted: <?php echo date('F j, Y, g:i a', strtotime($applicant['created_at'])); ?>
                                </p>
                            </div>
                            <div class="mt-3 mt-sm-0 d-flex align-items-center gap-2">
                                <button type="button" onclick="exportPDF()" class="btn btn-sm btn-danger d-inline-flex align-items-center gap-1">
                                    <i class="ti ti-file-pdf fs-16"></i> Export Profile PDF
                                </button>
                                <a href="applicants.php" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1">
                                    <i class="ti ti-arrow-left fs-16"></i> Return to Registry
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Flash Alert -->
                <?php if (isset($_GET['updated'])): ?>
                    <div class="alert alert-success alert-dismissible fade show py-2.5 px-3 fs-13 mb-3 d-flex align-items-center" role="alert">
                        <i class="ti ti-circle-check fs-18 me-2"></i>
                        <span>Candidate evaluation status has been successfully updated in the official database.</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <!-- Left Column: Profile Card & Status Action -->
                    <div class="col-lg-4 col-xl-4">
                        
                        <!-- Profile Card -->
                        <div class="card text-center mb-4">
                            <div class="card-body p-4">
                                <div class="position-relative d-inline-block mb-3">
                                    <?php if (!empty($applicant['profile_picture']) && file_exists('../uploads/' . $applicant['profile_picture'])): ?>
                                        <img src="../uploads/<?php echo htmlspecialchars($applicant['profile_picture']); ?>" alt="Profile Picture" class="rounded-circle object-fit-cover border border-3 border-warning shadow-sm" style="width: 130px; height: 130px;">
                                    <?php else: ?>
                                        <div class="rounded-circle bg-primary-subtle text-primary border border-3 border-warning d-flex align-items-center justify-content-center shadow-sm" style="width: 130px; height: 130px; font-size: 42px; font-weight: bold; margin: 0 auto;">
                                            <?php echo strtoupper(substr($applicant['full_name'], 0, 1)); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <h4 class="mb-1 fw-bold"><?php echo htmlspecialchars($applicant['full_name']); ?></h4>
                                <?php if (!empty($applicant['business_name'])): ?>
                                    <p class="text-primary fw-semibold fs-13 mb-1"><?php echo htmlspecialchars($applicant['business_name']); ?></p>
                                <?php endif; ?>
                                <p class="text-muted fs-12 mb-3">
                                    <i class="ti ti-map-pin text-warning me-1"></i><?php echo htmlspecialchars($applicant['audition_location']); ?> Audition Hub
                                </p>

                                <div class="mb-4">
                                    <?php
                                    $st = strtolower($applicant['status'] ?? 'pending');
                                    if ($st === 'shortlisted') {
                                        echo '<span class="badge status-badge-shortlisted px-3 py-1.5 fs-12 fw-bold text-uppercase"><i class="ti ti-check me-1"></i>Shortlisted Champion</span>';
                                    } elseif ($st === 'rejected') {
                                        echo '<span class="badge status-badge-rejected px-3 py-1.5 fs-12 fw-bold text-uppercase"><i class="ti ti-x me-1"></i>Rejected</span>';
                                    } else {
                                        echo '<span class="badge status-badge-pending px-3 py-1.5 fs-12 fw-bold text-uppercase"><i class="ti ti-clock me-1"></i>Awaiting Review</span>';
                                    }
                                    ?>
                                </div>

                                <!-- Evaluation Decision Form -->
                                <div class="p-3 bg-light rounded-3 border text-start">
                                    <label class="form-label fs-12 fw-bold text-uppercase text-muted mb-2">Update Evaluation Decision</label>
                                    <form action="" method="POST" class="d-flex flex-column gap-2">
                                        <select name="status" class="form-select form-select-sm">
                                            <option value="pending" <?php if($applicant['status'] == 'pending') echo 'selected'; ?>>Pending (Under Review)</option>
                                            <option value="shortlisted" <?php if($applicant['status'] == 'shortlisted') echo 'selected'; ?>>Shortlisted (Qualified)</option>
                                            <option value="rejected" <?php if($applicant['status'] == 'rejected') echo 'selected'; ?>>Rejected (Disqualified)</option>
                                        </select>
                                        <button type="submit" name="update_status" class="btn btn-sm btn-primary w-100 fw-bold">
                                            <i class="ti ti-check me-1"></i> Save Decision
                                        </button>
                                    </form>
                                </div>

                                <!-- Contact Shortcut Buttons -->
                                <div class="d-flex gap-2 mt-3">
                                    <a href="mailto:<?php echo htmlspecialchars($applicant['email']); ?>" class="btn btn-sm btn-outline-secondary w-50" title="Send Email">
                                        <i class="ti ti-mail me-1"></i> Email
                                    </a>
                                    <?php if (!empty($applicant['phone'])): ?>
                                        <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $applicant['phone']); ?>" target="_blank" class="btn btn-sm btn-outline-success w-50" title="WhatsApp Message">
                                            <i class="ti ti-brand-whatsapp me-1"></i> WhatsApp
                                        </a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                        <!-- Documents Card -->
                        <div class="card mb-4">
                            <div class="card-header border-bottom border-dashed py-3">
                                <h5 class="card-title mb-0 fs-14 text-uppercase fw-bold">
                                    <i class="ti ti-files text-primary me-1"></i> Verification Documents
                                </h5>
                            </div>
                            <div class="card-body p-3 d-flex flex-column gap-2">
                                <?php if (!empty($applicant['utility_bill'])): ?>
                                    <a href="../uploads/<?php echo htmlspecialchars($applicant['utility_bill']); ?>" target="_blank" class="doc-card">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="ti ti-file-invoice fs-20 text-warning"></i>
                                            <div>
                                                <div class="fs-13 fw-semibold">Utility Bill</div>
                                                <small class="text-muted fs-11">Lagos Residence Proof</small>
                                            </div>
                                        </div>
                                        <i class="ti ti-external-link text-muted"></i>
                                    </a>
                                <?php else: ?>
                                    <div class="p-2 text-muted fs-12 border rounded bg-light">No utility bill uploaded</div>
                                <?php endif; ?>

                                <?php if (!empty($applicant['government_id'])): ?>
                                    <a href="../uploads/<?php echo htmlspecialchars($applicant['government_id']); ?>" target="_blank" class="doc-card">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="ti ti-id-badge-2 fs-20 text-info"></i>
                                            <div>
                                                <div class="fs-13 fw-semibold">Government ID</div>
                                                <small class="text-muted fs-11">NIN / Voter's Card / Passport</small>
                                            </div>
                                        </div>
                                        <i class="ti ti-external-link text-muted"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($applicant['profile_picture'])): ?>
                                    <a href="../uploads/<?php echo htmlspecialchars($applicant['profile_picture']); ?>" target="_blank" class="doc-card">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="ti ti-photo fs-20 text-success"></i>
                                            <div>
                                                <div class="fs-13 fw-semibold">Profile Photo (Original)</div>
                                                <small class="text-muted fs-11">High Resolution Headshot</small>
                                            </div>
                                        </div>
                                        <i class="ti ti-external-link text-muted"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Candidate Details Dossier -->
                    <div class="col-lg-8 col-xl-8">

                        <!-- Personal & Vital Info Card -->
                        <div class="card mb-4">
                            <div class="card-header border-bottom border-dashed py-3">
                                <h5 class="card-title mb-0 fs-14 text-uppercase fw-bold">
                                    <i class="ti ti-user-check text-primary me-1"></i> Vital Personal Intel
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Email Address</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['email']); ?></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Phone Number</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['phone']); ?></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Gender</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['gender']); ?></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Marital Status</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['marital_status']); ?></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Date of Birth</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo date('F j, Y', strtotime($applicant['dob'])); ?></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Educational Qualification</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['qualification']); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Residency & Identification Protocol -->
                        <div class="card mb-4">
                            <div class="card-header border-bottom border-dashed py-3">
                                <h5 class="card-title mb-0 fs-14 text-uppercase fw-bold">
                                    <i class="ti ti-building-community text-primary me-1"></i> Residency & Lagos State Verification
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Residential Address</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['address']); ?></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">LASRRA Number</label>
                                        <div class="fs-14 fw-semibold text-warning">
                                            <i class="ti ti-shield-check me-1"></i>
                                            <?php echo htmlspecialchars($applicant['lasrra_number'] ?: 'NOT PROVIDED'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Instagram Handle</label>
                                        <div class="fs-14 fw-semibold text-dark">
                                            <i class="ti ti-brand-instagram text-danger me-1"></i>
                                            <?php if (!empty($applicant['instagram'])): ?>
                                                <a href="https://instagram.com/<?php echo ltrim($applicant['instagram'], '@'); ?>" target="_blank" class="text-decoration-none">
                                                    @<?php echo htmlspecialchars(ltrim($applicant['instagram'], '@')); ?>
                                                </a>
                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Preferred Audition Center</label>
                                        <div class="fs-14 fw-semibold text-dark">
                                            <span class="badge bg-secondary-subtle text-dark border px-2.5 py-1">
                                                <i class="ti ti-map-pin text-warning me-1"></i><?php echo htmlspecialchars($applicant['audition_location']); ?> Center
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Heard About Show Via</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['media_channel'] ?: 'Portal / Online'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Business Concept & Pitch -->
                        <div class="card mb-4">
                            <div class="card-header border-bottom border-dashed py-3">
                                <h5 class="card-title mb-0 fs-14 text-uppercase fw-bold">
                                    <i class="ti ti-bulb text-primary me-1"></i> Business Enterprise & Pitch
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-3 mb-4">
                                    <div class="col-sm-4">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Business Name</label>
                                        <div class="fs-14 fw-bold text-primary"><?php echo htmlspecialchars($applicant['business_name'] ?: 'Not Specified'); ?></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Sector / Industry</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['sector'] ?: 'General Enterprise'); ?></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-1">Operating Stage</label>
                                        <div class="fs-14 fw-semibold text-dark"><?php echo htmlspecialchars($applicant['stage'] ?: 'Idea / Early'); ?> (<?php echo htmlspecialchars($applicant['years_operation'] ?: '0'); ?> yrs)</div>
                                    </div>
                                </div>

                                <label class="text-muted fs-11 text-uppercase fw-bold d-block mb-2">Business Concept, Innovation & Pitch</label>
                                <div class="p-3 bg-light rounded-3 border fs-13 lh-lg text-dark" style="white-space: pre-wrap; min-height: 120px;">
                                    <?php echo htmlspecialchars($applicant['business_idea']); ?>
                                </div>
                            </div>
                        </div>

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

    <!-- Hidden PDF Template matching specific design -->
    <div id="pdf-template" style="position: absolute; left: -9999px; top: 0; width: 800px; background: #fff; padding: 40px; font-family: 'Arial', sans-serif; color: #000; box-sizing: border-box;">
        
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid #d4af37; padding-bottom: 15px; margin-bottom: 30px;">
            <div style="width: 180px;">
                <img src="../assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" style="width: 100%; height: auto;">
            </div>
            <div style="text-align: right;">
                <h1 style="margin: 0; font-size: 28px; letter-spacing: 2px; font-weight: normal; font-family: 'Times New Roman', serif;">PARTICIPANT PROFILE</h1>
                <p style="margin: 5px 0 0 0; color: #d4af37; font-size: 14px; font-weight: bold; letter-spacing: 2px;">SEASON I &mdash; ENTRY #<?php echo str_pad($applicant['id'], 3, '0', STR_PAD_LEFT); ?></p>
            </div>
        </div>

        <!-- Main Profile Details -->
        <div style="display: flex; gap: 30px; margin-bottom: 40px;">
            <!-- Image -->
            <div style="width: 250px; flex-shrink: 0;">
                <img src="../uploads/<?php echo $applicant['profile_picture'] ?: 'placeholder.png'; ?>" style="width: 100%; height: 250px; object-fit: cover; display: block;">
            </div>
            <!-- Details Grid -->
            <div style="flex-grow: 1; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="grid-column: span 2;">
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Full Name</p>
                    <p style="margin: 5px 0 0 0; font-size: 22px; font-weight: bold;"><?php echo htmlspecialchars($applicant['full_name']); ?></p>
                </div>
                <div>
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Email Address</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['email']); ?></p>
                </div>
                <div>
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Phone Number</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['phone']); ?></p>
                </div>
                <div>
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Gender / DOB</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['gender']); ?> , <?php echo date('Y-m-d', strtotime($applicant['dob'])); ?></p>
                </div>
                <div>
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Marital Status</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['marital_status']); ?></p>
                </div>
                <div>
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Qualification</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['qualification']); ?></p>
                </div>
                <div>
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Instagram Handle</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['instagram']); ?></p>
                </div>
            </div>
        </div>

        <!-- Business Idea -->
        <div style="margin-bottom: 40px;">
            <p style="margin: 0 0 10px 0; color: #d4af37; font-size: 14px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; border-bottom: 1px solid #e0e0e0; padding-bottom: 5px;">Business Idea / Concept</p>
            <div style="border: 1px solid #eaeaea; padding: 20px; background: #fafafa; font-size: 14px; line-height: 1.6; min-height: 80px; white-space: pre-wrap;"><?php echo htmlspecialchars($applicant['business_idea']); ?></div>
        </div>

        <!-- Bottom Split -->
        <div style="display: flex; gap: 40px; margin-bottom: 40px;">
            <div style="flex: 1;">
                <p style="margin: 0 0 15px 0; color: #d4af37; font-size: 14px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; border-bottom: 1px solid #e0e0e0; padding-bottom: 5px;">Audition Details</p>
                <div style="margin-bottom: 20px;">
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Preferred Audition Location</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['audition_location']); ?></p>
                </div>
                <div>
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Residential Address</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['address']); ?></p>
                </div>
            </div>
            <div style="flex: 1;">
                <p style="margin: 0 0 15px 0; color: #d4af37; font-size: 14px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; border-bottom: 1px solid #e0e0e0; padding-bottom: 5px;">Marketing Source</p>
                <div style="margin-bottom: 20px;">
                    <p style="margin: 0; color: #d4af37; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Heard About Show Via</p>
                    <p style="margin: 5px 0 0 0; font-size: 14px;"><?php echo htmlspecialchars($applicant['media_channel']); ?></p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div style="text-align: center; border-top: 1px solid #e0e0e0; padding-top: 20px; color: #888; font-size: 10px; margin-top: 50px;">
            &copy; <?php echo date('Y'); ?> Colossus of Lagos. Generated on <?php echo date('M d, Y H:i'); ?>
        </div>
    </div>

    <script>
        function exportPDF() {
            const element = document.getElementById('pdf-template');
            
            const wrapper = document.createElement('div');
            wrapper.style.position = 'fixed';
            wrapper.style.top = '0';
            wrapper.style.left = '0';
            wrapper.style.zIndex = '-9999';
            wrapper.style.opacity = '0';
            
            const clone = element.cloneNode(true);
            clone.style.position = 'relative';
            clone.style.left = 'auto';
            clone.style.top = 'auto';
            clone.style.display = 'block';
            
            wrapper.appendChild(clone);
            document.body.appendChild(wrapper);
            
            const opt = {
                margin:       10,
                filename:     'Colossus-Applicant-<?php echo $applicant['id']; ?>.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, useCORS: true, scrollY: 0 }, 
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(clone).save().then(() => {
                document.body.removeChild(wrapper);
            });
        }
    </script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>
</html>
