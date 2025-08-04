<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $phone   = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $message = htmlspecialchars($_POST['message']);

    // Email configuration
    $to      = "apsoprs2026@gmail.com";  // your target email address
    $subject = "New message from website contact form";

    $body = "You have received a new message:\n\n"
          . "Name: $name\n"
          . "Email: $email\n"
          . "Phone: $phone\n"
          . "Address: $address\n\n"
          . "Message:\n$message";

    $headers = "From: $email\r\n"
             . "Reply-To: $email\r\n"
             . "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Sorry, your message could not be sent. Please try again later.'); window.history.back();</script>";
    }
}
?>
