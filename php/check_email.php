
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
echo "Email does not exists. You will be redirected.";
    header( "refresh:3;url=../index.php?page=login" );

exit();
}

$reset_token = uniqid();

$stmt = $db->prepare("UPDATE tbl_users SET reset_token = :reset_token WHERE user_email = :user_email");
$stmt->bindParam(':reset_token', $reset_token);
$stmt->bindParam(':user_email', $user_email);
$stmt->execute();

$mail->addAddress($user_email);
$mail->isHTML(true);
$mail->Subject = 'Password reset link Digidate';
$mail->Body    = "We have a request for resetting your account. <br>Click on the following link to reset your password. <br><br>

<a href='localhost/index.php?page=update_password&email=$user_email&reset_token=$reset_token'>reset password</a>";

// Send the email
$mail->send();
echo 'Password reset succesfull sended! Check your email. You will be redirected.';
    header( "refresh:3;url=../index.php?page=login" );
} else {
echo "Alsjeblieft. vul je email in ";
exit();
}

} catch (Exception $e) {
echo "Onmogelijk om u een wachtwoord reset te sturen: {$mail->ErrorInfo}";
    session_start();
    session_destroy();
    session_unset();
    unset($_SESSION['role']);
    header('location: ../index.php?page=login');

}
