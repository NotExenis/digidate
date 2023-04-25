<?php 
require '../private/conn.php';

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$name = $_POST['name'];
$address = $_POST['address'];
$birthday = date('Y-m-d',strtotime($_POST['birthday']));
$city = $_POST['city'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$role = 'admin';
$payed = '1';
$accept_bool = '1';
$tag = 1;

$sql2 = "SELECT * FROM tbl_users WHERE user_email = :email";
$stmt2 = $db->prepare($sql2);
$stmt2->execute(array( 
    ':email'=>$email
));
$r = $stmt2->fetch();

if($stmt2->rowCount() == 0){
$sql = "INSERT INTO tbl_users(user_name, user_phone_number, user_address, user_city, user_gender, user_tags, user_email, user_password, user_role, user_payed, user_birthday, user_accepted)
        VALUES (:name, :phone_number, :address, :city, :gender, :email, , :tags, :password, :role, :payed, :birthday, :accepted)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            ':name' => $name,
            ':phone_number'=> $phone,
            ':address' => $address,
            ':city' => $city,
            ':gender' => $gender,
            ':email' => $email,
            ':tags' => $tag,
            ':password' => $password,
            ':role' => $role,
            ':birthday' => $birthday,
            ':payed' => $payed,
            ':accepted' => $accept_bool,
        ));
    } else {
        $_SESSION['email'] = 'Email is al in gebruik';
        header('location:../index.php?page=admin_add');

    }
header('location:../index.php?page=admin_dashboard');

?>