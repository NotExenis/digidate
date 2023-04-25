<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require '../private/conn.php';
require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'digidate2023@hotmail.com';
    $mail->Password   = 'Digidate2022!';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('digidate2023@hotmail.com', 'Digidate');

    if (isset($_POST['email'])) {
        $user_email = $_POST['email'];

        $stmt = $db->prepare("SELECT COUNT(*) FROM tbl_users WHERE user_email = :user_email");
        $stmt->bindParam(':user_email', $user_email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            echo "Email adres bestaat niet. Je wordt teruggestuurd.";
            header("refresh:3;url=../index.php?page=login");
            exit();
        }

        $verification_code = uniqid();

        $stmt = $db->prepare("UPDATE tbl_users SET verification_code = :verification_code WHERE user_email = :user_email");
        $stmt->bindParam(':verification_code', $verification_code);
        $stmt->bindParam(':user_email', $user_email);
        $stmt->execute();

        $mail->addAddress($user_email);
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = "Thank you for signing up with Digidate. <br>Please click on the link below to verify your email address and activate your account. <br>
        
        <a href='localhost/index.php?page=verify_email&email=$user_email&verification_code=$verification_code'>Verify Email</a>";

        // Send the email
        $mail->send();
        echo 'A verification email has been sent to your email address. Please check your inbox and click on the verification link to activate your account. You will be redirected shortly.';
        header("refresh:3;url=../index.php?page=login");
    } else {
        echo "Please enter your email address.";
        exit();
    }
} catch (Exception $e) {
    echo "Unable to send a verification email: {$mail->ErrorInfo}";
}
?>
