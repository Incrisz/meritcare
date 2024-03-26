<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $message = $_POST['inputMessage'];

    // Create email content
    $to = "godwinincrisz@gmail.com";
    $subject = "New Message from Contact Form";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $email_content)) {
        header("Location: https://incrisz.netlify.app");
        exit;
    } else {
        echo "<p class='error-msg'>Oops! Something went wrong. Please try again later.</p>";
    }
}
?>
