<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "teedsgames@gmail.com";

    // Set subject
    $subject = "New message from your website";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    $mail_success = mail($to, $subject, $email_message, $headers);

    // Check if the email was sent successfully
    if ($mail_success) {
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: your-contact-form-page.php");
    exit;
}
?>
