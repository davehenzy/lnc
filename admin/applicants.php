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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLOSSUS COMMAND | ENTITY REGISTRY</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Export Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        .filters {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            align-items: flex-end;
            background: rgba(255,255,255,0.02);
            padding: 20px;
            border-radius: 15px;
            border: 1px solid var(--border);
        }
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .filter-group label {
            font-size: 0.7rem;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 1px;
        }
        .filter-input {
            background: var(--bg-main);
            border: 1px solid var(--border);
            color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 0.85rem;
        }
        .btn-filter {
            background: var(--accent);
            color: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            height: 40px;
        }

        .export-btns {
            display: flex;
            gap: 10px;
        }

        .btn-export {
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--border);
            color: var(--text-main);
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-export:hover {
            background: rgba(255,255,255,0.1);
            border-color: var(--accent);
            color: var(--accent);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="../assets/logos/LNC%20Logo%20Light.png" alt="Logo">
            <span style="font-family: 'Outfit'; font-weight: 800; font-size: 1.2rem;">COMMAND</span>
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="index.php" class="nav-link"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
            <li class="nav-item"><a href="applicants.php" class="nav-link active"><i class="fas fa-user-friends"></i> <span>Applicants</span></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <div>
                <h1>ENTITY REGISTRY</h1>
                <div class="count"><?php echo count($applicants); ?> RECORDS FOUND</div>
            </div>
            <div class="export-btns">
                <a href="export-excel.php?<?php echo $_SERVER['QUERY_STRING']; ?>" class="btn-export">
                    <i class="fas fa-file-excel"></i> EXPORT EXCEL
                </a>
                <button onclick="exportToPDF()" class="btn-export">
                    <i class="fas fa-file-pdf"></i> EXPORT PDF
                </button>
            </div>
        </div>

        <form action="" method="GET" class="filters">
            <div class="filter-group" style="flex: 1;">
                <label>SEARCH ENTITY</label>
                <input type="text" name="search" class="filter-input" placeholder="Name, Email or Phone" value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <div class="filter-group">
                <label>LOCATION</label>
                <select name="location" class="filter-input">
                    <option value="">All Regions</option>
                    <?php foreach ($locations as $loc): ?>
                        <option value="<?php echo $loc; ?>" <?php if($location == $loc) echo 'selected'; ?>><?php echo $loc; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-group">
                <label>STATUS</label>
                <select name="status" class="filter-input">
                    <option value="">All Status</option>
                    <option value="pending" <?php if($status == 'pending') echo 'selected'; ?>>Pending</option>
                    <option value="shortlisted" <?php if($status == 'shortlisted') echo 'selected'; ?>>Shortlisted</option>
                    <option value="rejected" <?php if($status == 'rejected') echo 'selected'; ?>>Rejected</option>
                </select>
            </div>
            <button type="submit" class="btn-filter">APPLY FILTERS</button>
            <a href="applicants.php" style="color: var(--text-muted); font-size: 0.8rem; text-decoration: none; margin-bottom: 5px;">RESET</a>
        </form>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ENTITY</th>
                        <th>CONTACT</th>
                        <th>LOCATION</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($applicants)): ?>
                        <tr><td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted);">No records match your scan parameters.</td></tr>
                    <?php else: ?>
                        <?php foreach ($applicants as $applicant): ?>
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--bg-accent); overflow: hidden;">
                                            <?php if ($applicant['profile_picture']): ?>
                                                <img src="../uploads/<?php echo $applicant['profile_picture']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                            <?php else: ?>
                                                <i class="fas fa-user" style="display: flex; align-items: center; justify-content: center; height: 100%; color: var(--text-muted);"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <div style="font-weight: 700;"><?php echo htmlspecialchars($applicant['full_name']); ?></div>
                                            <div style="font-size: 0.75rem; color: var(--text-muted);"><?php echo htmlspecialchars($applicant['email']); ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td style="font-size: 0.85rem;"><?php echo htmlspecialchars($applicant['phone']); ?></td>
                                <td><?php echo htmlspecialchars($applicant['audition_location']); ?></td>
                                <td><span class="status-badge status-<?php echo $applicant['status']; ?>"><?php echo strtoupper($applicant['status']); ?></span></td>
                                <td>
                                    <a href="view-applicant.php?id=<?php echo $applicant['id']; ?>" class="btn-view">INSPECT PROTOCOL</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function exportToPDF() {
            const element = document.getElementById("full-report-content");
            element.style.display = "block"; // Temporarily show for capture
            
            const opt = {
                margin:       [0.3, 0.3],
                filename:     'LNC_Full_Registry_Report.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, backgroundColor: '#ffffff' },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'landscape' }
            };
            
            html2pdf().set(opt).from(element).toPdf().get('pdf').then(function (pdf) {
                element.style.display = "none"; // Hide again
            }).save();
        }
    </script>

    <!-- Hidden Report for PDF Export -->
    <div id="full-report-content" style="display: none; background: #fff; color: #000; padding: 40px; font-family: sans-serif;">
        <h1 style="text-align: center; color: #1a4fbb; margin-bottom: 30px;">LNC ENTITY REGISTRY | COMPLETE DATA REPORT</h1>
        <p style="text-align: center; font-size: 0.9rem; margin-bottom: 40px;">Report Generated: <?php echo date('F j, Y, g:i a'); ?></p>
        
        <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
            <thead>
                <tr style="background: #f4f4f4;">
                    <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">FULL NAME</th>
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
                        <td style="border: 1px solid #ddd; padding: 8px;">#<?php echo str_pad($row['id'], 4, '0', STR_PAD_LEFT); ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;"><?php echo htmlspecialchars($row['full_name']); ?></td>
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
                            LASRRA: <?php echo $row['lasrra_number']; ?>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;"><?php echo strtoupper($row['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
