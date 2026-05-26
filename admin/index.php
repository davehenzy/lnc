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

// Recent Applicants
$recent_applicants = $pdo->query("SELECT * FROM applicants ORDER BY created_at DESC LIMIT 5")->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagos New Colossus | Dashboard   </title>
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="../assets/slider/LASG-LNC.png" alt="Logo">

        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="index.php" class="nav-link active"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
            <li class="nav-item"><a href="applicants.php" class="nav-link"><i class="fas fa-user-friends"></i> <span>Applicants</span></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>SYSTEM OVERVIEW</h1>
            <div class="date"><?php echo date('F j, Y'); ?></div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Applicants</div>
                <div class="stat-value"><?php echo $total_applicants; ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Awaiting Review</div>
                <div class="stat-value" style="color: #ffc107;"><?php echo $pending_applicants; ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Shortlisted</div>
                <div class="stat-value" style="color: #28a745;"><?php echo $shortlisted_applicants; ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Lagos Presence</div>
                <div class="stat-value">100%</div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="font-size: 1.2rem; font-family: 'Outfit'; color: var(--text-muted);">RECENT INTEL</h2>
            <a href="applicants.php" style="color: var(--accent); text-decoration: none; font-size: 0.8rem; font-weight: 700;">VIEW ALL PROTOCOLS</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ENTITY NAME</th>
                        <th>LOCATION</th>
                        <th>TIMESTAMP</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recent_applicants)): ?>
                        <tr><td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted);">No entities registered in the crucible yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($recent_applicants as $applicant): ?>
                            <tr>
                                <td style="font-weight: 700;"><?php echo htmlspecialchars($applicant['full_name']); ?></td>
                                <td><?php echo htmlspecialchars($applicant['audition_location']); ?></td>
                                <td style="color: var(--text-muted); font-size: 0.8rem;"><?php echo date('M j, H:i', strtotime($applicant['created_at'])); ?></td>
                                <td><span class="status-badge status-<?php echo $applicant['status']; ?>"><?php echo strtoupper($applicant['status']); ?></span></td>
                                <td><a href="view-applicant.php?id=<?php echo $applicant['id']; ?>" class="btn-view">INSPECT</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
