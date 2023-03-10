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
$preference = $_POST['preference'];
$role = 'user';
$payed = '0';
$accept_bool = '0';
$pic = base64_encode(file_get_contents($_FILES['pic']['tmp_name']));



$sql2 = "SELECT * FROM tbl_users WHERE user_email = :email";
$stmt2 = $db->prepare($sql2);
$stmt2->execute(array( 
    ':email'=>$email
));
$r = $stmt2->fetch();

if($stmt2->rowCount() == 0){
$sql = "INSERT INTO tbl_users(user_name, user_phone_number, user_address, user_city, user_gender, user_preference, user_email, user_password, user_role, user_payed, user_birthday, user_accepted, user_photo)
        VALUES (:name, :phone_number, :address, :city, :gender, :preference, :email, :password, :role, :payed, :birthday, :accepted, :pic)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            ':name' => $name,
            ':phone_number'=> $phone,
            ':address' => $address,
            ':city' => $city,
            ':gender' => $gender,
            ':preference'=> $preference,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role,
            ':birthday' => $birthday,
            ':payed' => $payed,
            ':accepted' => $accept_bool,
            ':pic' => $pic
        ));
    } else {
        header('location:../index.php?page=register');
    }
    header('location:../index.php?page=login');

 
?>
