<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $marital_status = $_POST['marital_status'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $qualification = $_POST['qualification'] ?? '';
    $address = $_POST['address'] ?? '';
    $instagram = $_POST['instagram'] ?? '';
    $audition_location = $_POST['audition_location'] ?? '';
    $business_name = $_POST['business_name'] ?? '';
    $sector = $_POST['sector'] ?? '';
    $business_idea = $_POST['business_idea'] ?? '';
    $years_operation = $_POST['years_operation'] ?? '';
    $stage = $_POST['stage'] ?? '';
    $lasrra_number = $_POST['lasrra_number'] ?? '';
    $media_channel = $_POST['media_channel'] ?? '';

    // File Upload Handling
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $profile_picture = '';
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === 0) {
        $ext = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
        $profile_picture = 'profile_' . time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_dir . $profile_picture);
    }

    $utility_bill = '';
    if (isset($_FILES['utility_bill']) && $_FILES['utility_bill']['error'] === 0) {
        $ext = pathinfo($_FILES['utility_bill']['name'], PATHINFO_EXTENSION);
        $utility_bill = 'bill_' . time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['utility_bill']['tmp_name'], $upload_dir . $utility_bill);
    }

    $government_id = '';
    if (isset($_FILES['government_id']) && $_FILES['government_id']['error'] === 0) {
        $ext = pathinfo($_FILES['government_id']['name'], PATHINFO_EXTENSION);
        $government_id = 'id_' . time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['government_id']['tmp_name'], $upload_dir . $government_id);
    }

    // Generate unique registration reference number
    $reference_number = 'LNCC-' . date('Y') . '-' . rand(10000, 99999);

    try {
        $stmt = $pdo->prepare("INSERT INTO applicants (reference_number, full_name, email, phone, gender, marital_status, dob, qualification, address, instagram, audition_location, business_name, sector, business_idea, years_operation, stage, lasrra_number, utility_bill, government_id, media_channel, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $reference_number, $full_name, $email, $phone, $gender, $marital_status, $dob, $qualification, $address, $instagram, $audition_location, $business_name, $sector, $business_idea, $years_operation, $stage, $lasrra_number, $utility_bill, $government_id, $media_channel, $profile_picture
        ]);

        // --- Send Confirmation Email using PHPMailer ---
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'thenexttitan.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'info@thenexttitan.com';                // SMTP username
            $mail->Password   = 'E#B$f)V!lj},';                         // SMTP password
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
            $mail->Port       = 465;                                    // TCP port to connect to

            // Recipients
            $mail->setFrom('info@thenexttitan.com', 'Colossus of Lagos');
            $mail->addAddress($email, $full_name);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Registration Confirmation [' . $reference_number . '] - Colossus of Lagos';
            $mail->Body    = "
            <html>
            <head>
              <title>Registration Confirmation</title>
            </head>
            <body style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
              <h2 style='color: #0a1628;'>Hello $full_name,</h2>
              <p>Thank you for applying to the <strong>Colossus of Lagos</strong>.</p>
              <p>Your application has been received and is currently under review. Your official reference number is:</p>
              <div style='background: #0a1628; color: #d4af37; padding: 15px; border-radius: 6px; font-size: 20px; font-weight: bold; text-align: center; margin: 15px 0;'>
                Reference Number: $reference_number
              </div>
              <div style='background: #f9f9f9; padding: 15px; border-radius: 5px; margin: 20px 0;'>
                <h3 style='margin-top: 0; color: #d4af37;'>Application Summary</h3>
                <ul style='list-style-type: none; padding: 0;'>
                  <li style='margin-bottom: 8px;'><strong>Reference ID:</strong> $reference_number</li>
                  <li style='margin-bottom: 8px;'><strong>Name:</strong> $full_name</li>
                  <li style='margin-bottom: 8px;'><strong>Email:</strong> $email</li>
                  <li style='margin-bottom: 8px;'><strong>Phone:</strong> $phone</li>
                  <li style='margin-bottom: 8px;'><strong>Business Name:</strong> " . ($business_name ? $business_name : 'N/A') . "</li>
                  <li style='margin-bottom: 8px;'><strong>Sector:</strong> $sector</li>
                  <li style='margin-bottom: 8px;'><strong>Audition Location:</strong> $audition_location</li>
                </ul>
              </div>
              <p>Please keep this reference number safe for your audition call and screening stage.</p>
              <br>
              <p>Best Regards,<br><strong>Colossus of Lagos Team</strong></p>
            </body>
            </html>
            ";

            $mail->send();
        } catch (Exception $e) {
            // Error logging if needed
        }

        echo json_encode([
            'status' => 'success', 
            'reference_number' => $reference_number, 
            'message' => 'Your application has entered the Colossus Crucible.'
        ]);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
