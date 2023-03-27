<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require '../private/conn.php';
require '../vendor/autoload.php';

$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$name = $_POST['name'];
$address = $_POST['address'];
$birthday = date('Y-m-d',strtotime($_POST['birthday']));
$city = $_POST['city'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$preference = $_POST['preference'];
$role = 'user';
$payed = '0';
$accept_bool = '0';
$pic = base64_encode(file_get_contents($_FILES['pic']['tmp_name']));
$verification_code = bin2hex(random_bytes(16));
if ($password !== $confirm_password) {
    echo "Passwords do not match. Please try again.";
    header( "refresh:3;url=../index.php?page=register" );

} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $recaptcha_secret = "6LdVTR0lAAAAAHhrSLSlhiQj3BcIjtCyKIQaMSYb";

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $_POST['g-recaptcha-response']);

    $response = json_decode($response, true);


    if ($response["success"] === true) {

        echo "Form Submit Successfully. You are NOT a bot! ";

    } else {

        echo "You are a robot.. LEAVE ";

    }


    $sql2 = "SELECT * FROM tbl_users WHERE user_email = :email";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute(array(
        ':email' => $email
    ));
    $r = $stmt2->fetch();

    if ($stmt2->rowCount() == 0) {
        $sql = "INSERT INTO tbl_users (user_name, user_phone_number, user_address, user_city, user_gender, user_preference, user_email, user_password, user_role, user_payed, user_birthday, user_accepted, user_photo,user_verification_code, user_status)
        VALUES (:name, :phone_number, :address, :city, :gender, :preference, :email, :password, :role, :payed, :birthday, :accepted, :pic, :user_code, 'notactive')";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            ':name' => $name,
            ':phone_number' => $phone,
            ':address' => $address,
            ':city' => $city,
            ':gender' => $gender,
            ':preference' => $preference,
            ':email' => $email,
            ':password' => $hashed_password,
            ':role' => $role,
            ':birthday' => $birthday,
            ':payed' => $payed,
            ':accepted' => $accept_bool,
            ':pic' => $pic,
            ':user_code' => $verification_code
        ));

        // Send verification email
        $verification_url = "($verification_code)";

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'digidate2023@hotmail.com';
            $mail->Password = 'Digidate2022!';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('digidate2023@hotmail.com', 'Digidate');
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Verify your email address';
            $mail->Body = "Hi $name,<br><br>Please put the following code into the website to activate your account:  ($verification_code)  <br><br>tIf you did not sign up for an account on Digidate, please ignore this message.";

            $mail->send();
            echo 'Verification email sent';
        } catch (Exception $e) {
            echo 'Verification email could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        echo ' User registered successfully! Please check your email to verify your account.';
        header("refresh:3;url=../index.php?page=login");


    } else {
        echo 'Email address already exists. Please try again with a different email address.';
        header("refresh:3;url=../index.php?page=register");

    }
}
?>