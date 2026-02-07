<?php
if (isset($_POST['submit'])) {
    $to = "primebulidinglifting@gmail.com"; // Your email
    $subject = "New Contact Form Submission";
    
    // Sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        // Success Popup
        echo "<script>
                alert('Mail had been sent successfully!');
                window.location.href='index.html'; // Redirect back to your page
              </script>";
    } else {
        // Error Popup
        echo "<script>
                alert('Something went wrong. Please try again.');
                window.history.back();
              </script>";
    }
} else {
    header("Location: index.html");
}
?>