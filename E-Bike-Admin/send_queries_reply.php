
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include("connect.php"); // Include your database connection

if (isset($_POST['submit_reply'])) {
    $id = intval($_POST['id']);
    $email = $_POST['email'];
    $reply_message = $_POST['reply_message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '5566tahirul@gmail.com';
        $mail->Password   = 'athu exyi lltj stvz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('5566tahirul@gmail.com', 'Tahir');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Reply to Your Question';
        $mail->Body    = '<p>Dear Customer,</p><p>' . nl2br(htmlspecialchars($reply_message)) . '</p><p>Thank you for reaching out!</p>';
        $mail->AltBody = strip_tags($reply_message);

        $mail->send();
        // echo 'Reply has been sent successfully!';
        ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost/Diamond E-Bike Admin/query.php" />
       <?php
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);

?>