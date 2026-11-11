<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$message = '';
$error = '';

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $del_id = (int)$_GET['id'];
    $pdo->prepare("DELETE FROM announcements WHERE id = ?")->execute([$del_id]);
    header("Location: announcements.php?msg=deleted");
    exit();
}

// Handle Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? 'Show Announcement');
    $content = trim($_POST['content'] ?? '');
    $published_at = $_POST['published_at'] ?? date('Y-m-d');
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

    $image = 'assets/slider/Artboard 1.png';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_name = 'ann_' . time() . '_' . uniqid() . '.' . $ext;
        if (!is_dir('../uploads/')) {
            mkdir('../uploads/', 0777, true);
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image_name)) {
            $image = 'uploads/' . $image_name;
        }
    }

    if (!empty($title) && !empty($content)) {
        $stmt = $pdo->prepare("INSERT INTO announcements (title, slug, category, content, image, published_at) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $slug, $category, $content, $image, $published_at]);
        header("Location: announcements.php?msg=added");
        exit();
    } else {
        $error = "Please provide both title and content.";
    }
}

$announcements = $pdo->query("SELECT * FROM announcements ORDER BY published_at DESC, created_at DESC")->fetchAll();
$total_applicants = $pdo->query("SELECT COUNT(*) FROM applicants")->fetchColumn();
$unread_enquiries = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'unread'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Announcements & Bulletins | Colossus of Lagos - Administrative Command</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Colossus of Lagos Announcements Management" name="description" />

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
                        <a href="enquiries.php" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-mail"></i></span>
                            <span class="menu-text"> Enquiries </span>
                            <?php if ($unread_enquiries > 0): ?>
                                <span class="badge bg-danger rounded-pill"><?php echo $unread_enquiries; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="announcements.php" class="side-nav-link active">
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
                            <i class="ti ti-speakerphone fs-14"></i> Official Announcements Manager
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

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column justify-content-between mb-3">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 text-uppercase fw-bold m-0">Manage Announcements</h4>
                                <p class="text-muted fs-12 mb-0 mt-1">Publish bulletins, audition schedules, state partnership updates, and news</p>
                            </div>
                            <div class="mt-3 mt-sm-0 d-flex align-items-center gap-2">
                                <span class="badge bg-primary-subtle text-primary border px-3 py-2 fs-12 fw-semibold">
                                    <i class="ti ti-news me-1"></i> <?php echo count($announcements); ?> Published
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flash Alerts -->
                <?php if (isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
                    <div class="alert alert-success alert-dismissible fade show py-2.5 px-3 fs-13 mb-3 d-flex align-items-center" role="alert">
                        <i class="ti ti-circle-check fs-18 me-2"></i>
                        <span>Announcement successfully published to the platform!</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
                    <div class="alert alert-info alert-dismissible fade show py-2.5 px-3 fs-13 mb-3 d-flex align-items-center" role="alert">
                        <i class="ti ti-info-circle fs-18 me-2"></i>
                        <span>Announcement removed successfully.</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif ($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show py-2.5 px-3 fs-13 mb-3 d-flex align-items-center" role="alert">
                        <i class="ti ti-alert-triangle fs-18 me-2"></i>
                        <span><?php echo htmlspecialchars($error); ?></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Create Announcement Form Card -->
                <div class="card mb-4">
                    <div class="card-header border-bottom border-dashed py-3">
                        <h5 class="card-title mb-0 fs-14 text-uppercase fw-bold">
                            <i class="ti ti-plus text-primary me-1"></i> Create New Bulletin / Announcement
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="announcements.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Announcement Title *</label>
                                    <input type="text" name="title" required class="form-control" placeholder="e.g. Audition Dates Confirmed Across Lagos Hubs">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Category *</label>
                                    <select name="category" class="form-select">
                                        <option value="Auditions">Auditions</option>
                                        <option value="Partnership">Partnership</option>
                                        <option value="The Council">The Council</option>
                                        <option value="Bootcamp">Bootcamp</option>
                                        <option value="Show Announcement" selected>Show Announcement</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Publication Date</label>
                                    <input type="date" name="published_at" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Content / Notice Text *</label>
                                    <textarea name="content" rows="4" required class="form-control" placeholder="Write full bulletin or notice details for candidates and ecosystem partners..."></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fs-12 text-muted fw-bold text-uppercase mb-1">Featured Banner Image (Optional)</label>
                                    <input type="file" name="image" accept="image/*" class="form-control">
                                    <small class="text-muted fs-11">Recommended 16:9 banner image (PNG, JPG, WebP)</small>
                                </div>

                                <div class="col-md-6 d-flex align-items-end justify-content-md-end">
                                    <button type="submit" class="btn btn-primary fw-bold px-4 py-2 d-inline-flex align-items-center gap-1.5">
                                        <i class="ti ti-send"></i> Publish Announcement
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Existing Announcements List Card -->
                <div class="card">
                    <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="card-title mb-0 fs-15 text-uppercase fw-bold">Published Bulletins</h4>
                            <span class="badge bg-secondary-subtle text-secondary fs-11"><?php echo count($announcements); ?> Total</span>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-3">Notice Title & Details</th>
                                        <th>Category</th>
                                        <th>Publication Date</th>
                                        <th class="text-end pe-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($announcements)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                <div class="py-3">
                                                    <iconify-icon icon="solar:notes-minimalistic-bold-duotone" class="fs-48 text-muted mb-2"></iconify-icon>
                                                    <h5 class="fw-semibold">No announcements published yet</h5>
                                                    <p class="text-muted fs-13">Create your first public bulletin above to notify applicants.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($announcements as $row): ?>
                                            <tr>
                                                <td class="ps-3">
                                                    <h6 class="fs-13 mb-1 fw-bold text-dark"><?php echo htmlspecialchars($row['title']); ?></h6>
                                                    <p class="text-muted fs-12 mb-0" style="max-width: 500px;">
                                                        <?php echo htmlspecialchars(substr($row['content'], 0, 110)) . '...'; ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 fs-11 fw-semibold text-uppercase">
                                                        <?php echo htmlspecialchars($row['category']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="fs-12 text-dark fw-semibold">
                                                        <i class="ti ti-calendar text-muted me-1"></i>
                                                        <?php echo date('M j, Y', strtotime($row['published_at'] ?: $row['created_at'])); ?>
                                                    </div>
                                                </td>
                                                <td class="text-end pe-3">
                                                    <a href="announcements.php?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this announcement?');" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1">
                                                        <i class="ti ti-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer border-top border-dashed py-2.5 px-3">
                        <small class="text-muted fs-12">Announcements appear on the live portal for applicants, press, and viewers.</small>
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

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>
</html>
