<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $age = trim($_POST["age"]);
    $gender = isset($_POST["radio-gender"]) ? $_POST["radio-gender"] : "";
    $street_line_1 = trim($_POST["street_line_1"]);
    $street_line_2 = trim($_POST["street_line_2"]);
    $country = trim($_POST["country"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $postal_code = trim($_POST["postal_code"]);
    $position = isset($_POST["radio-position"]) ? $_POST["radio-position"] : "";
    $work_experience = isset($_POST["inputCountry"]) ? $_POST["inputCountry"] : "";
    $employment_type = isset($_POST["radio-availability"]) ? $_POST["radio-availability"] : "";
    $salary_range = isset($_POST["radio-salary"]) ? $_POST["radio-salary"] : "";
    $cover_letter = trim($_POST["cover-etter"]);
    // Construct the email message
    $message = "Name: $name\n" .
               "Email: $email\n" .
               "Phone: $phone\n" .
               "Age: $age\n" .
               "Gender: $gender\n" .
               "Street Line 1: $street_line_1\n" .
               "Street Line 2: $street_line_2\n" .
               "Country: $country\n" .
               "City: $city\n" .
               "State: $state\n" .
               "Postal Code: $postal_code\n" .
               "Job Position: $position\n" .
               "Work Experience: $work_experience\n" .
               "Employment Type: $employment_type\n" .
               "Salary Range: $salary_range\n" .
               "Cover Letter: $cover_letter";
    
    // Set the recipient email address
    $to = "incrisz4luv@gmail.com";
    
    // Set the email subject
    $email_subject = "New Job Application Submission";
    
    // Set the email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    
    // Attempt to send the email
    if (mail($to, $email_subject, $message, $headers)) {
        // If successful, redirect to a success page
        header("Location: https://affixtheme.com/html/xmee/demo/job-1-success.html");
        exit;
    } else {
        // If unsuccessful, display an error message
        echo "Sorry, there was a problem sending your application. Please try again later.";
    }
}
?>
