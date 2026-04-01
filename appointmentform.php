<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       $name       = $_POST['name'] ?? 'Not provided';
    $mobile     = $_POST['mobile'] ?? 'Not provided';
    $location   = $_POST['location'] ?? 'Not provided';
    $message    = $_POST['message'] ?? 'No message';

    $bill_range = $_POST['bill'] ?? 'Not selected';
    $property   = $_POST['property'] ?? 'Not selected';
    $other_bill = $_POST['bill_other_val'] ?? '';

    $final_bill = ($bill_range === 'Other' && !empty($other_bill))
        ? "Other (₹ $other_bill)"
        : $bill_range;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nabhassolar@nabhasconstruction.com';
        $mail->Password   = 'efafapdpyowzqemf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom('nabhassolar@nabhasconstruction.com', 'Solar Quote Request');
        $mail->addAddress('nabhassolar@nabhasconstruction.com', 'Admin Notification');

        $mail->isHTML(true);
        $mail->Subject = 'New Quote Request - ' . $name;

        $mail->Body = "
            <div style='font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px; border-radius: 10px;'>
                <h2 style='color: #2d3436;'>Nabhas Solar Quote Request Details</h2>

                <p><strong>Full Name:</strong> $name</p>
                <p><strong>Mobile:</strong> $mobile</p>
                <p><strong>Location:</strong> $location</p>

                <hr>

                <p><strong>Monthly Electricity Bill:</strong> $final_bill</p>
                <p><strong>Type of Property:</strong> $property</p>

                <hr>

                <p><strong>Additional Message:</strong><br>$message</p>
            </div>
        ";

        if ($mail->send()) {
           
        }

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    echo "Direct access not allowed.";
}
?>