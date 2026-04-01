<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $contactname = $_POST['contactname'] ?? '';
    $contactemail = $_POST['contactemail'] ?? '';
    $propertytype = $_POST['property'] ?? '';
    $contactnumber = $_POST['contactnumber'] ?? '';
    $contactmessage = $_POST['contactmessage'] ?? '';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nabhassolar@nabhasconstruction.com';
        $mail->Password = 'efafapdpyowzqemf';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('nabhassolar@nabhasconstruction.com', 'Nabhas Solar');
        $mail->addAddress('nabhassolar@nabhasconstruction.com', 'Nabhas Solar');

        $mail->isHTML(true);
        $mail->Subject = 'Nabhas Solar  Message from Contact Form';
        $mail->Body = "
            <h1>Contact Details</h1>
            <p><strong>Name:</strong> $contactname</p>
            <p><strong>Email:</strong> $contactemail</p>
            <p><strong>Property Type:</strong> $propertytype</p>
            <p><strong>Phone:</strong> $contactnumber</p>
            <p><strong>Message:</strong> $contactmessage</p>
        ";

        $mail->send();
        // echo "success";

        //  echo '<script> window.alert("Message has been sent.\n\nPlease click OK."); window.location.href="index.php";</script>';

    } catch (Exception $e) {
        echo "error";
    }

} else {
    echo 'Access Denied';
}
?>

