<?php
require 'private/conn.php';

if(isset($_GET['email'])) {
    $email = $_GET['email'];

    $sql = 'SELECT email_verified FROM tbl_users WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result && $result['email_verified'] == 'unverified') {
        $sql = 'UPDATE tbl_users SET email_verified = :verified WHERE email = :email';
        $stmt = $db->prepare($sql);
        $verified = 'verified';
        $stmt->bindParam(':verified', $verified);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo 'Your email has been verified successfully.';
    } else {
        echo 'Your email has already been verified or does not exist.';
    }
} else {
    echo 'Invalid email address.';
}
?>