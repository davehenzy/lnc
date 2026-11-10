<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? 'General Enquiry');
    $message = trim($_POST['message'] ?? '');

    if (empty($full_name) || empty($email) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields (Name, Email, Message).']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO enquiries (full_name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$full_name, $email, $phone, $subject, $message]);

        // Attempt sending notification email via PHPMailer
        if (file_exists('PHPMailer/src/PHPMailer.php')) {
            require_once 'PHPMailer/src/Exception.php';
            require_once 'PHPMailer/src/PHPMailer.php';
            require_once 'PHPMailer/src/SMTP.php';

            try {
                $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                $mail->isSMTP();
                $mail->Host       = 'thenexttitan.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'info@thenexttitan.com';
                $mail->Password   = 'E#B$f)V!lj},';
                $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->setFrom('info@thenexttitan.com', 'Colossus of Lagos Enquiries');
                $mail->addAddress('info@thenexttitan.com', 'Admin Desk');
                $mail->addReplyTo($email, $full_name);

                $mail->isHTML(true);
                $mail->Subject = 'New Website Enquiry: ' . $subject;
                $mail->Body = "
                    <h3>New Enquiry Submitted via Website</h3>
                    <p><strong>From:</strong> " . htmlspecialchars($full_name) . " (" . htmlspecialchars($email) . ")</p>
                    <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
                    <p><strong>Subject:</strong> " . htmlspecialchars($subject) . "</p>
                    <p><strong>Message:</strong></p>
                    <blockquote style='background:#f4f4f4; padding:15px; border-left:4px solid #d4af37;'>" . nl2br(htmlspecialchars($message)) . "</blockquote>
                ";
                $mail->send();
            } catch (Exception $e) {
                // Ignore mailer errors so user still gets success confirmation
            }
        }

        echo json_encode([
            'status' => 'success',
            'message' => 'Thank you! Your message has been received. Our team will contact you shortly.'
        ]);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>

