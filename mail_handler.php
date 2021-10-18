<?php 
if(isset($_POST['submit'])){
    $to = "f32ee@localhost"; // this is the admin's Email address
    $from = $_POST['email']; // this is the sender's email address
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];

    // TO ADMIN - Header and Message
    $subject = "Contact Form Submission";
    $message = $firstName . " " . $lastName . " (" . $from . ") " . "submitted the following:" . "\n\n" . $_POST['message'];

    // TO SENDER - Header and Message
    $subject2 = "Copy of your form submission";
    $message2 = "Here is a copy of your message " . $firstName . "\n\n" . $_POST['message'];

    $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($to,$subject,$message,$headers, '-ff32ee@localhost');
    mail($to,$subject2,$message2,$headers, '-ff32ee@localhost'); // sends a copy of the message to the sender

    echo "Your inquiries have been sent successfully! Thank you " . $firstName . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>