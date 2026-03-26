<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Composer వాడుతుంటే ఇది అవసరం
require 'vendor/autoload.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. ఫారం డేటాను వేరియబుల్స్ లోకి తీసుకోవడం
    $name       = $_POST['name'] ?? 'Not provided';
    $mobile     = $_POST['mobile'] ?? 'Not provided';
    $location   = $_POST['location'] ?? 'Not provided';
    $message    = $_POST['message'] ?? 'No message';
    $bill_range = $_POST['bill'] ?? 'Not selected';
    $bill_range = $_POST['prop'] ?? 'Not selected';
    $other_bill = $_POST['bill_other_val'] ?? '';
    $property   = $_POST['property'] ?? 'Not selected';

    // "Other" అమౌంట్ ఉంటే దాన్ని కలపడం
    $final_bill = ($bill_range === 'Other') ? "Other (₹ $other_bill)" : $bill_range;

    $mail = new PHPMailer(true);

    try {
        // --- Server Settings ---
        // $mail->SMTPDebug = 2; // ఒకవేళ మెయిల్ వెళ్లకపోతే ఎర్రర్ చూడటానికి దీన్ని అన్-కామెంట్ చేయండి
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'manimalladi05@gmail.com'; 
        $mail->Password   = 'ngaekuqfbllvquny'; // మీ App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // SSL సర్టిఫికేట్ సమస్యలు రాకుండా ఈ క్రింది సెట్టింగ్స్ ఉపయోగపడతాయి
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // --- Recipients ---
        $mail->setFrom('manimalladi05@gmail.com', 'Solar Quote Request');
        $mail->addAddress('manimalladi05@gmail.com', 'Admin Notification'); 

        // --- Content ---
        $mail->isHTML(true);
        $mail->Subject = 'New Quote Request - ' . $name;
        
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px; border-radius: 10px;'>
                <h2 style='color: #2d3436;'>New Quote Request Details</h2>
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

        // మెయిల్ పంపడం
        if($mail->send()) {
            echo '<script>
                    alert("Thank you! YOU SUCEESSFULLY APPLY.");
                    window.location.href="index.php"; 
                  </script>';
        }

    } catch (Exception $e) {
        // ఎర్రర్ వస్తే ఇక్కడ కనిపిస్తుంది
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'నేరుగా యాక్సెస్ చేయడానికి అనుమతి లేదు.';
}
?>