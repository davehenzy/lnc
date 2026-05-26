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
