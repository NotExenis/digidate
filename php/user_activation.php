<?php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// Get form data
$email = $_POST['email'];
$code = $_POST['user_verification_code'];

// Validate form data
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
echo 'Ongeldig e-mailadres.';
} elseif (empty($code)) {
echo 'Vul een code in.';
} else {

// Include database connection
include '../private/conn.php';

// Prepare statement to prevent SQL injection
$stmt = $db->prepare("SELECT * FROM tbl_users WHERE user_email = :email");
$stmt->bindParam(":email", $email);
$stmt->execute();


$user = $stmt->fetch();

// Check if code is correct
if ($user['user_verification_code'] == $code) {

// Update user status to active
    $stmt = $db->prepare("UPDATE tbl_users SET user_status = 'active', user_verification_code = NULL WHERE user_email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();


if ($stmt->rowCount() > 0) {
echo 'Your account is succesfull activated. You will be redirected.. ';
    header( "refresh:3;url=../index.php?page=home" );

} else {
echo 'There was a error while activating your account.';
    header( "refresh:3;url=../index.php?page=verify" );

}

} else {
echo 'Wrong activation code.';
    header( "refresh:3;url=../index.php?page=verify" );

}
}

// Close database connection
$stmt->closeCursor();
$db = null;

}
?>