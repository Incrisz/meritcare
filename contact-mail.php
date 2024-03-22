<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $subject = trim($_POST["subject"]);
    
    // Construct the email message
    $message = "First Name: $fname\n" .
               "Last Name: $lname\n" .
               "Email: $email\n" .
               "Phone: $phone\n" .
               "Message:\n$subject";
    
    // Set the recipient email address
    $to = "enquiries@meritcare.co.uk";
    // $to = "incrisz4luv@gmail.com";

    
    // Set the email subject
    $email_subject = "New Contact Form Submission";
    
    // Set the email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    
    // Attempt to send the email
    if (mail($to, $email_subject, $message, $headers)) {
        // If successful, redirect to a thank you page
        header("Location: success.html");
        exit;
    } else {
        // If unsuccessful, display an error message
        echo "Sorry, there was a problem sending your message. Please try again later.";
    }
}
?>
