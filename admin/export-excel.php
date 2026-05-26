<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    exit('Unauthorized');
}

// Get filters (same as applicants.php)
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
$applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Set headers for CSV download
$filename = "LNC_Complete_Registry_" . date('Y-m-d_H-i-s') . ".csv";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename);

$output = fopen('php://output', 'w');

// Set CSV headers
fputcsv($output, [
    'ID', 
    'Full Name', 
    'Email', 
    'Phone', 
    'Gender', 
    'Marital Status', 
    'Date of Birth', 
    'Qualification', 
    'Address', 
    'Instagram', 
    'Audition Location', 
    'Business Idea', 
    'LASRRA Number', 
    'Media Channel', 
    'Status', 
    'Registration Date'
]);

// Add data rows
foreach ($applicants as $row) {
    fputcsv($output, [
        $row['id'],
        $row['full_name'],
        $row['email'],
        $row['phone'],
        $row['gender'],
        $row['marital_status'],
        $row['dob'],
        $row['qualification'],
        $row['address'],
        $row['instagram'],
        $row['audition_location'],
        $row['business_idea'],
        $row['lasrra_number'],
        $row['media_channel'],
        strtoupper($row['status']),
        $row['created_at']
    ]);
}

fclose($output);
exit();
?>
