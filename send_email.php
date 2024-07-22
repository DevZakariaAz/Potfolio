<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email configuration
    $to = "your-email@example.com"; // Replace with your email address
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    
    // Email body
    $body = "<h2>Contact Form Submission</h2>";
    $body .= "<p><strong>Name:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Subject:</strong> {$subject}</p>";
    $body .= "<p><strong>Message:</strong><br>{$message}</p>";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message sending failed!";
    }
} else {
    echo "Invalid request!";
}
?>
