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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLOSSUS COMMAND | INSPECT ENTITY</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
        }
        .profile-card {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid var(--border);
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 20px;
            border: 4px solid var(--accent);
            padding: 5px;
            object-fit: cover;
        }
        .info-card {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .info-section {
            margin-bottom: 35px;
        }
        .info-section h3 {
            font-size: 0.8rem;
            color: var(--accent);
            letter-spacing: 2px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 10px;
        }
        .info-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }
        .info-item label {
            display: block;
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }
        .info-item span {
            font-weight: 600;
            color: var(--text-main);
            font-size: 0.95rem;
        }
        .status-form {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid var(--border);
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .btn-update {
            background: var(--accent);
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-update:hover {
            background: var(--accent-hover);
        }
        .document-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--accent);
            text-decoration: none;
            background: rgba(212, 175, 55, 0.1);
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
            margin-right: 15px;
            transition: all 0.3s;
            border: 1px solid transparent;
        }
        .document-link:hover {
            background: rgba(212, 175, 55, 0.15);
            border-color: rgba(212, 175, 55, 0.3);
        }
        
        @media (max-width: 1024px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
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
        <div class="header" data-html2canvas-ignore="true">
            <div>
                <h1>INSPECTING: <?php echo strtoupper($applicant['full_name']); ?></h1>
                <p style="color: var(--text-muted); font-size: 0.8rem;">ENTITY ID: #LNC-<?php echo str_pad($applicant['id'], 4, '0', STR_PAD_LEFT); ?></p>
            </div>
            <div style="display: flex; gap: 15px; align-items: center;">
                <button onclick="exportPDF()" class="btn-update" style="background: #2563eb; color: #fff; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-family: 'Outfit';">
                    <i class="fas fa-file-pdf"></i> EXPORT PDF
                </button>
                <a href="applicants.php" style="color: var(--text-muted); text-decoration: none;"><i class="fas fa-arrow-left"></i> RETURN TO REGISTRY</a>
            </div>
        </div>

        <?php if (isset($_GET['updated'])): ?>
            <div style="background: rgba(40, 167, 69, 0.1); color: #28a745; padding: 15px; border-radius: 10px; margin-bottom: 25px; border: 1px solid rgba(40, 167, 69, 0.2);">
                ENTITY PROTOCOL UPDATED SUCCESSFULLY.
            </div>
        <?php endif; ?>

        <div class="detail-grid">
            <div class="left-col">
                <div class="profile-card">
                    <img src="../uploads/<?php echo $applicant['profile_picture'] ?: 'placeholder.png'; ?>" alt="Profile" class="profile-img">
                    <h2 style="font-family: 'Outfit'; margin-bottom: 5px;"><?php echo htmlspecialchars($applicant['full_name']); ?></h2>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 25px;"><?php echo htmlspecialchars($applicant['audition_location']); ?> District</p>
                    
                    <span class="status-badge status-<?php echo $applicant['status']; ?>" style="font-size: 1rem; padding: 10px 25px;">
                        <?php echo strtoupper($applicant['status']); ?>
                    </span>

                    <form action="" method="POST" class="status-form" data-html2canvas-ignore="true">
                        <select name="status" class="form-input" style="flex: 1;">
                            <option value="pending" <?php if($applicant['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                            <option value="shortlisted" <?php if($applicant['status'] == 'shortlisted') echo 'selected'; ?>>Shortlisted</option>
                            <option value="rejected" <?php if($applicant['status'] == 'rejected') echo 'selected'; ?>>Rejected</option>
                        </select>
                        <button type="submit" name="update_status" class="btn-update">UPDATE</button>
                    </form>
                </div>
            </div>

            <div class="right-col">
                <div class="info-card">
                    <div class="info-section">
                        <h3>VITAL INTEL</h3>
                        <div class="info-row">
                            <div class="info-item">
                                <label>Email Address</label>
                                <span><?php echo htmlspecialchars($applicant['email']); ?></span>
                            </div>
                            <div class="info-item">
                                <label>Phone Number</label>
                                <span><?php echo htmlspecialchars($applicant['phone']); ?></span>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-item">
                                <label>Gender</label>
                                <span><?php echo htmlspecialchars($applicant['gender']); ?></span>
                            </div>
                            <div class="info-item">
                                <label>Marital Status</label>
                                <span><?php echo htmlspecialchars($applicant['marital_status']); ?></span>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-item">
                                <label>Date of Birth</label>
                                <span><?php echo date('F j, Y', strtotime($applicant['dob'])); ?></span>
                            </div>
                            <div class="info-item">
                                <label>Qualification</label>
                                <span><?php echo htmlspecialchars($applicant['qualification']); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h3>RESIDENT PROTOCOL</h3>
                        <div class="info-item" style="margin-bottom: 20px;">
                            <label>Residential Address</label>
                            <span><?php echo htmlspecialchars($applicant['address']); ?></span>
                        </div>
                        <div class="info-row">
                            <div class="info-item">
                                <label>LASRRA Number</label>
                                <span><?php echo $applicant['lasrra_number'] ?: 'NOT PROVIDED'; ?></span>
                            </div>
                            <div class="info-item">
                                <label>Instagram</label>
                                <span>@<?php echo htmlspecialchars($applicant['instagram']); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h3>BUSINESS VISION</h3>
                        <p style="white-space: pre-wrap; line-height: 1.8; color: var(--text-main);"><?php echo htmlspecialchars($applicant['business_idea']); ?></p>
                    </div>

                    <div class="info-section">
                        <h3>DOCUMENT ARCHIVE</h3>
                        <?php if ($applicant['utility_bill']): ?>
                            <a href="../uploads/<?php echo $applicant['utility_bill']; ?>" target="_blank" class="document-link">
                                <i class="fas fa-file-invoice"></i> VIEW UTILITY BILL
                            </a>
                        <?php endif; ?>
                        
                        <a href="../uploads/<?php echo $applicant['profile_picture']; ?>" target="_blank" class="document-link">
                            <i class="fas fa-id-badge"></i> FULL PROFILE IMAGE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden PDF Template matching specific design -->
    <div id="pdf-template" style="position: absolute; left: -9999px; top: 0; width: 800px; background: #fff; padding: 40px; font-family: 'Arial', sans-serif; color: #000; box-sizing: border-box;">
        
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid #d4af37; padding-bottom: 15px; margin-bottom: 30px;">
            <div style="width: 180px;">
                <!-- We use the LNC Dark Logo since the background is white -->
                <img src="../assets/logos/LNC_Logo_dark.png" alt="Logo" style="width: 100%; height: auto;">
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
            &copy; <?php echo date('Y'); ?> Lagos New Colossus. Generated on <?php echo date('M d, Y H:i'); ?>
        </div>
    </div>

    <script>
        function exportPDF() {
            const element = document.getElementById('pdf-template');
            
            // Create a wrapper container to hide the clone from the user 
            // but keep it in the normal document flow for html2canvas
            const wrapper = document.createElement('div');
            wrapper.style.position = 'fixed';
            wrapper.style.top = '0';
            wrapper.style.left = '0';
            wrapper.style.zIndex = '-9999';
            wrapper.style.opacity = '0'; // Completely invisible to user
            
            // Clone the template
            const clone = element.cloneNode(true);
            // CRITICAL: Remove the absolute positioning that breaks html2canvas
            clone.style.position = 'relative';
            clone.style.left = 'auto';
            clone.style.top = 'auto';
            clone.style.display = 'block';
            
            wrapper.appendChild(clone);
            document.body.appendChild(wrapper);
            
            const opt = {
                margin:       10,
                filename:     'LNCC-Applicant-<?php echo $applicant['id']; ?>.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, useCORS: true, scrollY: 0 }, 
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(clone).save().then(() => {
                // Cleanup
                document.body.removeChild(wrapper);
            });
        }
    </script>
</body>
</html>
