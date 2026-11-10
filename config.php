<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lncc_db');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
    $pdo->exec("USE " . DB_NAME);
    
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
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_admin);
    
    // Insert default admin if not exists (password: admin123)
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE username = 'admin'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $hashed_password = password_hash('admin123', PASSWORD_DEFAULT);
        $pdo->prepare("INSERT INTO admins (username, password) VALUES ('admin', ?)")->execute([$hashed_password]);
    }

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
