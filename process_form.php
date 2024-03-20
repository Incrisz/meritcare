<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : "";
    $age = isset($_POST["age"]) ? trim($_POST["age"]) : "";
    $street_line_1 = isset($_POST["street_line_1"]) ? trim($_POST["street_line_1"]) : "";
    $street_line_2 = isset($_POST["street_line_2"]) ? trim($_POST["street_line_2"]) : "";
    $country = isset($_POST["country"]) ? trim($_POST["country"]) : "";
    $city = isset($_POST["city"]) ? trim($_POST["city"]) : "";
    $postal_code = isset($_POST["postal_code"]) ? trim($_POST["postal_code"]) : "";
    $highest_edu = isset($_POST["highest_edu"]) ? trim($_POST["highest_edu"]) : "";
    $name_of_institution = isset($_POST["name_of_institution"]) ? trim($_POST["name_of_institution"]) : "";
    $degree = isset($_POST["degree"]) ? trim($_POST["degree"]) : "";
    $field_of_study = isset($_POST["field_of_study"]) ? trim($_POST["field_of_study"]) : "";
    $year_of_graduation = isset($_POST["year_of_graduation"]) ? trim($_POST["year_of_graduation"]) : "";
    $work_exp = isset($_POST["work_exp"]) ? trim($_POST["work_exp"]) : "";
    $skills = isset($_POST["skills"]) ? trim($_POST["skills"]) : "";
    $job_title = isset($_POST["job_title"]) ? trim($_POST["job_title"]) : "";
    $time = isset($_POST["time"]) ? trim($_POST["time"]) : "";
    $legal = isset($_POST["legal"]) ? trim($_POST["legal"]) : "";
    $convicted = isset($_POST["convicted"]) ? trim($_POST["convicted"]) : "";
    $certifications = isset($_POST["certifications"]) ? trim($_POST["certifications"]) : "";

    // Construct the email message
    $message = "Name: $name\n" .
               "Email: $email\n" .
               "Phone: $phone\n" .
               "Age: $age\n" .
               "Street Line 1: $street_line_1\n" .
               "Street Line 2: $street_line_2\n" .
               "Country: $country\n" .
               "City: $city\n" .
               "Postal Code: $postal_code\n" .
               "Highest Level of Education Attained: $highest_edu\n" .
               "Name of Institution: $name_of_institution\n" .
               "Degree/Diploma/Certification Obtained: $degree\n" .
               "Field of Study: $field_of_study\n" .
               "Year of Graduation: $year_of_graduation\n" .
               "Previous Work Experience: $work_exp\n" .
               "Relevant Skills and Qualifications: $skills\n" .
               "Desired Position/Job Title: $job_title\n" .
               "Availability: $time\n" .
               "Legally Authorized to Work: $legal\n" .
               "Convicted of a Felony: $convicted\n" .
               "Certifications Relevant to the Position: $certifications";

    // Set the recipient email address
    $to = "princeadefresh@gmail.com";

    // Set the email subject
    $email_subject = "New Job Application Submission";

    // Set the email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Attempt to send the email
    if (mail($to, $email_subject, $message, $headers)) {
        // If successful, redirect to a success page
        header("Location: https://meritcare.co.uk/form/success.html");
        exit;
    } else {
        // If unsuccessful, display an error message
        echo "Sorry, there was a problem sending your application. Please try again later.";
    }
}
?>
