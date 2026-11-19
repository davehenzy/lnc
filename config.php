<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lncc_db');

try {
    // Attempt direct connection to database first (standard for live cPanel/production hosting)
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Fallback for local XAMPP setup where database might not exist yet
        $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
        $pdo->exec("USE " . DB_NAME);
    }
    
    // Create applicants table
    $sql = "CREATE TABLE IF NOT EXISTS applicants (
        id INT AUTO_INCREMENT PRIMARY KEY,
        reference_number VARCHAR(100) UNIQUE,
        full_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        gender VARCHAR(20),
        marital_status VARCHAR(20),
        dob DATE,
        qualification VARCHAR(255),
        address TEXT,
        instagram VARCHAR(255),
        audition_location VARCHAR(100),
        business_name VARCHAR(255),
        sector VARCHAR(100),
        business_idea TEXT,
        years_operation VARCHAR(50),
        stage VARCHAR(50),
        lasrra_number VARCHAR(100),
        utility_bill VARCHAR(255),
        government_id VARCHAR(255),
        media_channel VARCHAR(100),
        profile_picture VARCHAR(255),
        status ENUM('pending', 'shortlisted', 'rejected') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);

    // Ensure reference_number column exists if table was created previously without it
    try {
        $pdo->exec("ALTER TABLE applicants ADD COLUMN reference_number VARCHAR(100) UNIQUE AFTER id");
    } catch (PDOException $ex) {
        // Column already exists
    }

    // Create enquiries table for Contact Form
    $sql_enquiries = "CREATE TABLE IF NOT EXISTS enquiries (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(50),
        subject VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        status ENUM('unread', 'read', 'replied') DEFAULT 'unread',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_enquiries);

    // Create announcements table for News & Announcements
    $sql_announcements = "CREATE TABLE IF NOT EXISTS announcements (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL,
        category VARCHAR(100) DEFAULT 'Show Announcement',
        content TEXT NOT NULL,
        image VARCHAR(255) DEFAULT 'assets/slider/Artboard 1.png',
        published_at DATE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_announcements);

    // Seed sample announcements if empty
    $ann_count = $pdo->query("SELECT COUNT(*) FROM announcements")->fetchColumn();
    if ($ann_count == 0) {
        $stmt_ann = $pdo->prepare("INSERT INTO announcements (title, slug, category, content, image, published_at) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_ann->execute([
            'Official Season Auditions Announced Across 5 Lagos Zones',
            'official-season-auditions-announced',
            'Auditions',
            'The Lagos State Government in partnership with Bravopoints International has officially released audition dates across Ikeja, Badagry, Ikorodu, Lagos Island, and Epe.',
            'assets/slider/Artboard 1.png',
            date('Y-m-d')
        ]);
        $stmt_ann->execute([
            'Lagos State Ministry of Wealth Creation Backs N30M Grand Prize',
            'ministry-wealth-creation-backs-30m-prize',
            'Partnership',
            'The Lagos State Government confirms its strategic partnership offering N30 million to the grand champion and N1M each to 40 bootcamp entrepreneurs.',
            'assets/slider/Artboard 2.png',
            date('Y-m-d', strtotime('-2 days'))
        ]);
        $stmt_ann->execute([
            'Over 20 Titans and CEOs Confirmed for The Council & Mentorship',
            'titans-ceos-confirmed-council-mentorship',
            'The Council',
            'Leading Nigerian entrepreneurs, industrialists, and investors will mentor contestants throughout the competition and evaluate boardroom pitches.',
            'assets/slider/Artboard 3.png',
            date('Y-m-d', strtotime('-5 days'))
        ]);
    }

    // Create newsletter_subscribers table
    $sql_newsletters = "CREATE TABLE IF NOT EXISTS newsletter_subscribers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_newsletters);
    
    // Create admin table
    $sql_admin = "CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        full_name VARCHAR(255) DEFAULT 'System Administrator',
        email VARCHAR(255) DEFAULT 'admin@colossusoflagos.com',
        role VARCHAR(50) DEFAULT 'admin',
        status VARCHAR(20) DEFAULT 'active',
        last_login DATETIME NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_admin);

    // Ensure enhanced columns exist in admins table
    $admin_columns = [
        'full_name' => "VARCHAR(255) DEFAULT 'System Administrator'",
        'email' => "VARCHAR(255) DEFAULT 'admin@colossusoflagos.com'",
        'role' => "VARCHAR(50) DEFAULT 'admin'",
        'status' => "VARCHAR(20) DEFAULT 'active'",
        'last_login' => "DATETIME NULL"
    ];
    foreach ($admin_columns as $col => $col_def) {
        try {
            $pdo->exec("ALTER TABLE admins ADD COLUMN $col $col_def");
        } catch (PDOException $ex) {
            // Column already exists
        }
    }
    
    // Insert or upgrade default super admin accounts
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE username = 'admin'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $hashed_password = password_hash('admin123', PASSWORD_DEFAULT);
        $pdo->prepare("INSERT INTO admins (username, password, full_name, email, role, status) VALUES ('admin', ?, 'Executive Super Admin', 'admin@colossusoflagos.com', 'super_admin', 'active')")->execute([$hashed_password]);
    } else {
        // Upgrade admin to super_admin
        $pdo->exec("UPDATE admins SET role = 'super_admin' WHERE username = 'admin'");
    }

    $stmt_super = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE username = 'superadmin'");
    $stmt_super->execute();
    if ($stmt_super->fetchColumn() == 0) {
        $hashed_super_pass = password_hash('superadmin123', PASSWORD_DEFAULT);
        $pdo->prepare("INSERT INTO admins (username, password, full_name, email, role, status) VALUES ('superadmin', ?, 'Principal Super Administrator', 'superadmin@colossusoflagos.com', 'super_admin', 'active')")->execute([$hashed_super_pass]);
    }

    // Create Audit Logs table
    $sql_audit = "CREATE TABLE IF NOT EXISTS audit_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        admin_id INT NULL,
        admin_username VARCHAR(100) NULL,
        action VARCHAR(100) NOT NULL,
        details TEXT NULL,
        ip_address VARCHAR(50) NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_audit);

    // Create System Settings table
    $sql_settings = "CREATE TABLE IF NOT EXISTS system_settings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        setting_key VARCHAR(100) UNIQUE NOT NULL,
        setting_value TEXT NULL,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_settings);

    // Seed default settings if empty
    $default_settings = [
        'registration_status' => 'open',
        'competition_season' => 'Season 1 (2026)',
        'grand_prize' => '₦30,000,000',
        'bootcamp_slots' => '30',
        'island_hub_name' => 'Lagos Island Audition Centre',
        'mainland_hub_name' => 'Lagos Mainland Audition Centre',
        'contact_email' => 'info@colossusoflagos.com',
        'maintenance_mode' => '0'
    ];
    $setting_stmt = $pdo->prepare("INSERT IGNORE INTO system_settings (setting_key, setting_value) VALUES (?, ?)");
    foreach ($default_settings as $key => $val) {
        $setting_stmt->execute([$key, $val]);
    }

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Global Super Admin Helpers
if (!function_exists('is_super_admin')) {
    function is_super_admin() {
        return isset($_SESSION['admin_role']) && $_SESSION['admin_role'] === 'super_admin';
    }
}

if (!function_exists('require_super_admin')) {
    function require_super_admin() {
        if (!isset($_SESSION['admin_logged_in'])) {
            header("Location: login.php");
            exit();
        }
        if (!is_super_admin()) {
            header("Location: index.php?error=unauthorized");
            exit();
        }
    }
}

if (!function_exists('log_audit_action')) {
    function log_audit_action($pdo, $action, $details = '') {
        try {
            $admin_id = $_SESSION['admin_id'] ?? null;
            $admin_username = $_SESSION['admin_username'] ?? 'System';
            $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
            $stmt = $pdo->prepare("INSERT INTO audit_logs (admin_id, admin_username, action, details, ip_address) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$admin_id, $admin_username, $action, $details, $ip]);
        } catch (Exception $e) {
            // Silently continue if logging fails
        }
    }
}
?>
