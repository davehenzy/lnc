<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    exit('Unauthorized');
}

// Helper to format phone numbers cleanly for Excel and prevent scientific notation / leading zero stripping
function clean_phone_for_excel($phone) {
    $raw = trim((string)$phone);
    if ($raw === '') {
        return '';
    }

    $digits = preg_replace('/[^0-9]/', '', $raw);

    // If 10 digits starting with 7, 8, 9 (user omitted leading 0): add leading 0
    if (strlen($digits) === 10 && in_array($digits[0], ['7', '8', '9'])) {
        $digits = '0' . $digits;
    }

    // 11 digits starting with 0 (standard Nigerian format): 080X XXX XXXX
    if (strlen($digits) === 11 && $digits[0] === '0') {
        $formatted = substr($digits, 0, 4) . ' ' . substr($digits, 4, 3) . ' ' . substr($digits, 7);
    }
    // 13 digits starting with 234 (+234 international format): +234 XXX XXX XXXX
    elseif (strlen($digits) === 13 && substr($digits, 0, 3) === '234') {
        $formatted = '+234 ' . substr($digits, 3, 3) . ' ' . substr($digits, 6, 3) . ' ' . substr($digits, 9);
    }
    // 14 digits starting with 0234
    elseif (strlen($digits) === 14 && substr($digits, 0, 4) === '0234') {
        $formatted = '+234 ' . substr($digits, 4, 3) . ' ' . substr($digits, 7, 3) . ' ' . substr($digits, 10);
    }
    // Has a leading plus
    elseif (strpos($raw, '+') === 0 && strlen($digits) >= 10) {
        $formatted = '+' . $digits;
    }
    // Other 10-12 digit sequence: chunk with spaces for readability
    elseif (strlen($digits) >= 10 && strlen($digits) <= 12) {
        $formatted = substr($digits, 0, 4) . ' ' . substr($digits, 4, 3) . ' ' . substr($digits, 7);
    }
    else {
        $formatted = $raw;
    }

    // Tab prefix ensures Excel treats it as literal string across all versions
    return "\t" . $formatted;
}

// Helper to ensure numeric IDs/codes like LASRRA retain leading zeros and avoid scientific notation
function clean_numeric_text_for_excel($value) {
    $raw = trim((string)$value);
    if ($raw === '') {
        return '';
    }
    if (ctype_digit($raw) || preg_match('/^\+?[0-9\s\-]+$/', $raw)) {
        return "\t" . $raw;
    }
    return $raw;
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

log_audit_action($pdo, 'Export to Excel', 'Exported ' . count($applicants) . ' applicant records to CSV.');

// Set headers for CSV download
$filename = "LNC_Complete_Registry_" . date('Y-m-d_H-i-s') . ".csv";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename);

$output = fopen('php://output', 'w');

// Send UTF-8 BOM so Excel opens with proper character encoding (accented letters, symbols)
fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

// Set CSV headers
fputcsv($output, [
    'ID', 
    'Reference Number',
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
        $row['reference_number'] ?? ('LNCC-2026-' . $row['id']),
        $row['full_name'],
        $row['email'],
        clean_phone_for_excel($row['phone']),
        $row['gender'],
        $row['marital_status'],
        $row['dob'],
        $row['qualification'],
        $row['address'],
        $row['instagram'],
        $row['audition_location'],
        $row['business_idea'],
        clean_numeric_text_for_excel($row['lasrra_number'] ?? ''),
        $row['media_channel'],
        strtoupper($row['status']),
        $row['created_at']
    ]);
}

fclose($output);
exit();
?>
