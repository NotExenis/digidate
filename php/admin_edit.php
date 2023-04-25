<?php 
require '../private/conn.php';
$id = $_POST['admin_id'] ?? '';
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$name = $_POST['name'];
$address = $_POST['address'];
$birthday = date('Y-m-d',strtotime($_POST['birthday']));
$city = $_POST['city'];
$phone = $_POST['phone'];

if($password == null){
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
            ':id' => $id,

        ));  
} elseif($birthday == null) {
    $sql = "UPDATE tbl_users
        SET user_email = :email, user_password = :password, user_name = :name, user_address = :address, user_city = :city, user_phone_number = :phone
        WHERE user_id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            ':email' => $email,
            ':password' => $password,
            ':name' => $name,
            ':address' => $address,
            ':city' => $city,
            ':phone' => $phone,
            ':id' => $id,
        ));  
} else {
    $sql = "UPDATE tbl_users
        SET user_email = :email, user_password = :password, user_name = :name, user_address = :address, user_birthday = :birthday, user_city = :city, user_phone_number = :phone
        WHERE user_id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            ':email' => $email,
            ':password' => $password,
            ':name' => $name,
            ':address' => $address,
            ':birthday' => $birthday,
            ':city' => $city,
            ':phone' => $phone,
            ':id' => $id,
        ));  
}
// header('location:../index.php?page=admin_dashboard');


      
?>