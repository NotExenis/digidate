<?php

include 'private/conn.php';


if (isset($_GET['email']) && isset($_GET['reset_token'])) {
    $_SESSION['reset_email'] = $_GET['email'];
    $_SESSION['reset_token'] = $_GET['reset_token'];
} else {
    header('Location: ../index.php?page=login');
    exit;
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $reset_email = $_SESSION['reset_email'];
    $reset_token = $_SESSION['reset_token'];

    $stmt = $db->prepare("UPDATE tbl_users SET user_password=:password WHERE user_email=:email AND reset_token=:reset_token");

    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $reset_email);
    $stmt->bindParam(':reset_token', $reset_token);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Password reset succesfull for email: $reset_email. You will be redirected to the login page.";
        header("refresh:3;url=../index.php?page=login");

    } else {
        echo "Niet gelukt om een update te voltooien... Neem contact op.";
    }

    unset($_SESSION['reset_email']);
    unset($_SESSION['reset_token']);
}

?>
<div class="container">
<h1>Reset wachtwoord</h1>

<form method="post">
    <label for="wachtwoord">Nieuw wachtwoord:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Reset wachtwoord">
</form>
</div>