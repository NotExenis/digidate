<?php
include '../private/conn.php';

if (isset($_POST['submit'])) {
    $code = $_POST['user_verification_code'];
    $email = $_POST['email'];
    $stmt = $db->prepare("SELECT * FROM tbl_users WHERE user_verification_code = :code ");
    $stmt->bindParam(':code', $code);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo "Invalid verification code or email address. Or you already have verified your account.";
        die();
    }

    $stmt = $db->prepare("UPDATE tbl_users SET user_status = 'verified', user_verification_code = NULL WHERE user_email = :email ");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "<div class='alert alert-success'>Your account has been activated!</div>";
    header("refresh:3;url=../index.php?page=login");
}
else {
    // If the form was not submitted, show the verification form
    header('Location: ../index.php?page=verify');
}
?>