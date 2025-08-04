<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Where the email should go
    $to = "apsoprs2026@gmail.com"; // Change this to your email

    // Email subject
    $subject = "New Query from Website";

    // Email body
    $body = "You have received a new query from your website:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // Optionally redirect to a thank you page
        echo "<script>alert('Message sent successfully!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Sorry, your message could not be sent. Please try again later.'); window.history.back();</script>";
    }
} else {
    // If accessed directly without POST data
    echo "Invalid access.";
}
?>
