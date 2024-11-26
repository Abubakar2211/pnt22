<?php
include 'db.php'; // Include your database connection file

// Function to sanitize input data
function sanitizeData($data) {
    return htmlspecialchars(trim($data));
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input fields
    $list_id = isset($_POST['list_id']) ? intval($_POST['list_id']) : null;
    $subject = sanitizeData($_POST['subject']);
    $emailBody = sanitizeData($_POST['emailBody']);
    
    // Fetch recipient emails from the selected list
    $recipient_emails = [];
    if (!empty($_POST['recipient'])) {
        $recipient_emails = $_POST['recipient'];
    }
    
    // Attachments handling (if needed)
    $attachment = null;
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['attachment']['tmp_name'];
        $attachment = file_get_contents($tmp_name);
    }

    // Additional validation and processing as needed
    
    // Example: Send email to recipients
    $to = implode(', ', $recipient_emails);
    $headers = "From: pnt-testing@buildingcomforts.com\r\n";
    $headers .= "Reply-To: pnt-testing@buildingcomforts.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // If you have attachments, adjust headers and content accordingly
    if ($attachment) {
        $boundary = md5(time());
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";
        
        $message = "--" . $boundary . "\r\n";
        $message .= "Content-Type: text/html; charset=\"UTF-8\"\r\n";
        $message .= "\r\n";
        $message .= $emailBody . "\r\n";
        $message .= "\r\n";
        
        $message .= "--" . $boundary . "\r\n";
        $message .= "Content-Type: application/octet-stream; name=\"attachment.pdf\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n";
        $message .= "Content-Disposition: attachment\r\n";
        $message .= "\r\n";
        $message .= chunk_split(base64_encode($attachment)) . "\r\n";
        $message .= "--" . $boundary . "--\r\n";
    } else {
        $message = $emailBody;
    }
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        
        // echo "<script>alert('Email sent successfully to: $to ')</script>";
        // header("Location: messaging.php");
         echo "<script>
            alert('Email sent successfully to: " . implode(', ', $recipient_emails) . "');
            window.location.href = 'messaging.php';
        </script>";
    } else {
        echo "Failed to send email.";
    }
    
    // You may want to redirect back to display.php or another page after processing
    // header("Location: display.php");
    // exit();
} else {
    // Redirect or handle errors if the form was not submitted properly
    header("Location: messaging.php");
    exit();
}
?>
