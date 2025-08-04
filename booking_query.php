<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = htmlspecialchars($_POST["name"]);
    $email    = htmlspecialchars($_POST["email"]);
    $contact  = htmlspecialchars($_POST["contact"]);
    $persons  = htmlspecialchars($_POST["persons"]);
    $hotel    = htmlspecialchars($_POST["hotel"]);
    $remarks  = htmlspecialchars($_POST["remarks"]);

    // Prepare email content
    $to      = "info@exoticnortheast.com";    // your receiving email address
    $subject = "New Booking Query from Website";

    $message = "You have received a new booking query:\n\n"
             . "Name: $name\n"
             . "Email: $email\n"
             . "Contact Number: $contact\n"
             . "Number of Person: $persons\n"
             . "Hotel Selected: $hotel\n"
             . "Remarks: $remarks";

    $headers = "From: $email\r\n"
             . "Reply-To: $email\r\n"
             . "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Booking query sent successfully. We will get back to you soon.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Sorry, your booking query could not be sent. Please try again later.'); window.history.back();</script>";
    }
} else {
    // If someone accesses this PHP file directly without POST data
    header("Location: index.html");
    exit();
}
?>
