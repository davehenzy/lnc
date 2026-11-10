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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Announcements | Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .form-panel {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }
        .form-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 6px;
            font-weight: 700;
        }
        .form-control {
            width: 100%;
            background: rgba(0,0,0,0.3);
            border: 1px solid var(--border);
            padding: 10px 15px;
            border-radius: 8px;
            color: #fff;
            box-sizing: border-box;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--accent);
        }
        .btn-submit {
            background: var(--accent);
            color: #000;
            font-weight: 800;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-submit:hover {
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
        }
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
            <li class="nav-item"><a href="enquiries.php" class="nav-link"><i class="fas fa-envelope"></i> <span>Enquiries</span></a></li>
            <li class="nav-item"><a href="announcements.php" class="nav-link active"><i class="fas fa-bullhorn"></i> <span>Announcements</span></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <div>
                <h1>MANAGE ANNOUNCEMENTS & NEWS</h1>
                <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 5px;">Publish bulletin notices, audition updates, and media releases</p>
            </div>
            <div class="date"><?php echo date('F j, Y'); ?></div>
        </div>

        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
            <div style="background: rgba(40, 167, 69, 0.2); border: 1px solid #28a745; color: #a3e9b2; padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; font-size: 0.85rem;">
                Announcement successfully published to homepage!
            </div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
            <div style="background: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; color: #f8b4b4; padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; font-size: 0.85rem;">
                Announcement deleted.
            </div>
        <?php endif; ?>

        <!-- Create Announcement Form -->
        <div class="form-panel">
            <h2 style="font-size: 1.1rem; color: #fff; margin-bottom: 20px; font-family: 'Outfit';">
                <i class="fas fa-plus-circle" style="color: var(--accent); margin-right: 8px;"></i> CREATE NEW ANNOUNCEMENT
            </h2>
            <form action="announcements.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group">
                        <label>ANNOUNCEMENT TITLE *</label>
                        <input type="text" name="title" required class="form-control" placeholder="e.g. Official Audition Schedule Released">
                    </div>
                    <div class="form-group">
                        <label>CATEGORY *</label>
                        <select name="category" class="form-control">
                            <option value="Auditions">Auditions</option>
                            <option value="Partnership">Partnership</option>
                            <option value="The Council">The Council</option>
                            <option value="Bootcamp">Bootcamp</option>
                            <option value="Show Announcement">Show Announcement</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>PUBLICATION DATE</label>
                        <input type="date" name="published_at" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label>CONTENT / BULLETIN TEXT *</label>
                    <textarea name="content" rows="4" required class="form-control" placeholder="Write announcement details for website visitors..."></textarea>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label>FEATURED IMAGE (OPTIONAL)</label>
                    <input type="file" name="image" accept="image/*" class="form-control">
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> PUBLISH ANNOUNCEMENT
                </button>
            </form>
        </div>

        <!-- Existing Announcements List -->
        <h2 style="font-size: 1.1rem; color: #fff; margin-bottom: 15px; font-family: 'Outfit';">
            PUBLISHED ANNOUNCEMENTS (<?php echo count($announcements); ?>)
        </h2>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <th>DATE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($announcements)): ?>
                        <tr><td colspan="4" style="text-align: center; padding: 40px; color: var(--text-muted);">No announcements published yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($announcements as $row): ?>
                            <tr>
                                <td>
                                    <strong style="color: #fff;"><?php echo htmlspecialchars($row['title']); ?></strong>
                                    <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 4px;">
                                        <?php echo htmlspecialchars(substr($row['content'], 0, 90)) . '...'; ?>
                                    </div>
                                </td>
                                <td><span class="status-badge status-pending"><?php echo htmlspecialchars($row['category']); ?></span></td>
                                <td style="font-size: 0.8rem; color: var(--text-muted);"><?php echo date('M j, Y', strtotime($row['published_at'] ?: $row['created_at'])); ?></td>
                                <td>
                                    <a href="announcements.php?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this announcement?');" style="color: #ff6b6b; font-size: 0.8rem; text-decoration: none; font-weight: 700;">
                                        <i class="fas fa-trash"></i> DELETE
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

