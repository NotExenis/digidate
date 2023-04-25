
<?php

require '../private/conn.php';
$email = $_POST['user_email'];
$name = $_POST['user_name'];
$address = $_POST['user_address'];
$birthday = date('Y-m-d', strtotime($_POST['user_birthday']));
$city = $_POST['user_city'];
$phone = $_POST['user_phone_number'];

$id = $_SESSION['id'];

{
    $sql = "UPDATE tbl_users
        SET user_email = :email, user_name = :name, user_address = :address, user_birthday = :birthday, user_city = :city, user_phone_number = :phone
        WHERE user_id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':email' => $email,
        ':name' => $name,
        ':address' => $address,
        ':birthday' => $birthday,
        ':city' => $city,
        ':phone' => $phone,
        ':id' => $id
    ));
}
// header('location:../index.php?page=profiel');


?>