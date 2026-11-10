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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Enquiries | Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .enquiry-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }
        .enquiry-card.unread {
            border-left: 4px solid var(--accent);
            background: rgba(212, 175, 55, 0.04);
        }
        .enquiry-card:hover {
            border-color: var(--accent);
        }
        .action-link {
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-right: 6px;
        }
        .btn-read { background: rgba(255,255,255,0.08); color: #fff; }
        .btn-reply { background: #28a745; color: #fff; }
        .btn-del { background: rgba(220, 53, 69, 0.2); color: #ff6b6b; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="../assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo">
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="index.php" class="nav-link"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
            <li class="nav-item"><a href="applicants.php" class="nav-link"><i class="fas fa-user-friends"></i> <span>Applicants</span></a></li>
            <li class="nav-item"><a href="enquiries.php" class="nav-link active"><i class="fas fa-envelope"></i> <span>Enquiries</span></a></li>
            <li class="nav-item"><a href="announcements.php" class="nav-link"><i class="fas fa-bullhorn"></i> <span>Announcements</span></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <div>
                <h1>WEBSITE ENQUIRIES</h1>
                <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 5px;">Messages and contact requests submitted via public portal</p>
            </div>
            <div class="date"><?php echo date('F j, Y'); ?></div>
        </div>

        <div class="stats-grid" style="grid-template-columns: repeat(3, 1fr); margin-bottom: 25px;">
            <div class="stat-card">
                <div class="stat-label">Total Messages</div>
                <div class="stat-value"><?php echo $total_enquiries; ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Unread Messages</div>
                <div class="stat-value" style="color: #ffc107;"><?php echo $unread_enquiries; ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Response Channel</div>
                <div class="stat-value" style="color: #28a745;">Active (Email / WA)</div>
            </div>
        </div>

        <!-- Filter Form -->
        <form action="" method="GET" style="display: flex; gap: 15px; margin-bottom: 25px; background: rgba(255,255,255,0.02); padding: 15px; border-radius: 12px; border: 1px solid var(--border);">
            <input type="text" name="search" placeholder="Search by sender, email or message text..." value="<?php echo htmlspecialchars($search); ?>" style="flex: 1; background: rgba(0,0,0,0.3); border: 1px solid var(--border); padding: 10px 15px; border-radius: 8px; color: #fff;">
            <select name="status" style="background: rgba(0,0,0,0.3); border: 1px solid var(--border); padding: 10px 15px; border-radius: 8px; color: #fff;">
                <option value="">All Status</option>
                <option value="unread" <?php if($status==='unread') echo 'selected'; ?>>Unread</option>
                <option value="read" <?php if($status==='read') echo 'selected'; ?>>Read</option>
                <option value="replied" <?php if($status==='replied') echo 'selected'; ?>>Replied</option>
            </select>
            <button type="submit" style="background: var(--accent); color: #000; font-weight: 700; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer;">FILTER</button>
            <a href="enquiries.php" style="color: var(--text-muted); text-decoration: none; align-self: center; font-size: 0.8rem;">RESET</a>
        </form>

        <!-- Messages Feed -->
        <div>
            <?php if (empty($enquiries)): ?>
                <div style="text-align: center; padding: 60px; color: var(--text-muted); background: rgba(255,255,255,0.02); border-radius: 12px; border: 1px solid var(--border);">
                    <i class="fas fa-inbox" style="font-size: 2.5rem; margin-bottom: 15px; opacity: 0.5;"></i>
                    <p>No enquiries matching this criteria.</p>
                </div>
            <?php else: ?>
                <?php foreach ($enquiries as $msg): ?>
                    <div class="enquiry-card <?php echo $msg['status'] === 'unread' ? 'unread' : ''; ?>">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                            <div>
                                <h3 style="font-size: 1.1rem; color: #fff; margin-bottom: 4px;"><?php echo htmlspecialchars($msg['subject']); ?></h3>
                                <div style="font-size: 0.8rem; color: var(--text-muted);">
                                    From: <strong style="color: var(--accent);"><?php echo htmlspecialchars($msg['full_name']); ?></strong> 
                                    &bull; <?php echo htmlspecialchars($msg['email']); ?>
                                    <?php if ($msg['phone']): ?> &bull; Tel: <?php echo htmlspecialchars($msg['phone']); ?><?php endif; ?>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <span class="status-badge status-<?php echo $msg['status'] === 'unread' ? 'pending' : ($msg['status'] === 'replied' ? 'shortlisted' : 'pending'); ?>">
                                    <?php echo strtoupper($msg['status']); ?>
                                </span>
                                <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 5px;">
                                    <?php echo date('M j, Y H:i', strtotime($msg['created_at'])); ?>
                                </div>
                            </div>
                        </div>

                        <div style="background: rgba(0,0,0,0.25); padding: 15px; border-radius: 8px; font-size: 0.9rem; line-height: 1.6; color: #ddd; margin-bottom: 15px; border-left: 2px solid rgba(255,255,255,0.1);">
                            <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                        </div>

                        <div style="display: flex; gap: 8px; align-items: center;">
                            <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>?subject=Re: <?php echo urlencode($msg['subject']); ?>" class="action-link btn-reply">
                                <i class="fas fa-reply"></i> Reply via Email
                            </a>
                            <?php if ($msg['phone']): ?>
                                <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $msg['phone']); ?>" target="_blank" class="action-link" style="background:#25D366; color:#fff;">
                                    <i class="fab fa-whatsapp"></i> Chat on WhatsApp
                                </a>
                            <?php endif; ?>
                            <?php if ($msg['status'] === 'unread'): ?>
                                <a href="enquiries.php?action=mark_read&id=<?php echo $msg['id']; ?>" class="action-link btn-read">
                                    <i class="fas fa-check"></i> Mark Read
                                </a>
                            <?php endif; ?>
                            <?php if ($msg['status'] !== 'replied'): ?>
                                <a href="enquiries.php?action=mark_replied&id=<?php echo $msg['id']; ?>" class="action-link btn-read">
                                    <i class="fas fa-check-double"></i> Mark Replied
                                </a>
                            <?php endif; ?>
                            <a href="enquiries.php?action=delete&id=<?php echo $msg['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?');" class="action-link btn-del" style="margin-left: auto;">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

