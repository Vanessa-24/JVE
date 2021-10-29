<?php 

// Get customer's personal details from checkout page
if(isset($_POST['submit'])){
    $to = "f32ee@localhost"; // this is the admin's Email address
    $from = $_POST['email']; // this is the sender's email address
    $firstName = $_POST['firstname'];

    // TO SENDER - Header and Message
    $subject = "We have received your payment!";
    $message = "Hello" . $firstName . "!\n\n" . "Your payment has been verified. Your order number is. " . $_POST['message'] . "\n\n" . "Here is a copy of your invoice:\n\n" . "http://192.168.56.2/f32ee/webapp-design-project/.invoice.php?orderNo=" . $_POST['message'];

    $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($to,$subject,$message,$headers, '-ff32ee@localhost');

    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>