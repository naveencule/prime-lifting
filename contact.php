<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Set the recipient email address
    $to = "primebuildinglifting@gmail.com"; 
    
    // 2. Get form data
    $first_name = strip_tags(trim($_POST["first_name"]));
    $last_name  = strip_tags(trim($_POST["last_name"]));
    $email      = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone      = strip_tags(trim($_POST["phone"]));
    $message    = strip_tags(trim($_POST["message"]));

    // 3. Prepare the email content
    $subject = "New Contact Form Submission: $first_name $last_name";
    
    $email_content = "You have received a new message from your website contact form.\n\n";
    $email_content .= "Full Name: $first_name $last_name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    // 4. Build email headers
    $headers = "From: $first_name <$email>";

    // 5. Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Success: Redirect back with a success message
        echo "<script>alert('Thank you! Your message has been sent.'); window.location.href='contact.html';</script>";
    } else {
        // Error
        echo "<script>alert('Oops! Something went wrong and we couldn't send your message.'); window.history.back();</script>";
    }
} else {
    // Not a POST request
    header("Location: contact.html");
    exit;
}
?>