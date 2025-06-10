<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your email address
    $to = "info@finaxainvestments.com";  

    // Subject of the email
    $subject = "New Contact Form Submission";

    // Sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $number = htmlspecialchars($_POST['number']);
    $investment = htmlspecialchars($_POST['investment']);
    $referral = htmlspecialchars($_POST['referral']);
    $message = htmlspecialchars($_POST['message']);

    // Email body content
    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $number\n";
    $body .= "Investment: $investment\n";
    $body .= "Referral: $referral\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Try to send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending the message.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>
