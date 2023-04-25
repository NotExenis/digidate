<?php
require '../private/conn.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM tbl_users WHERE user_email = :email";
$stmt = $db->prepare($sql);
$stmt->execute(array(
':email' => $email
));
$r = $stmt->fetch();

if(password_verify($password, $r['user_password'])){
$_SESSION['id'] = $r['user_id'];
$_SESSION['role'] = $r['user_role'];
$_SESSION['naam'] = $r['user_name'];
$_SESSION['accepted'] = $r['user_accepted'];
if(isset($_SESSION['user_role'])){
if($_SESSION['user_role'] == 'admin'){
header('Location: ../index.php?page=home_admin');
} elseif ($_SESSION['user_role'] == 'user'){
header('Location: ../index.php?page=home');
} elseif($_SESSION['accepted'] == 0 && $_SESSION['role'] != 'admin'){
header('Location: ../index.php?page=waiting_list');
}
}
else{
// Check if user_status is 'notactive' and redirect to verify page
if ($r['user_status'] == 'notactive') {
header('Location: ../index.php?page=verify');
} else {
// Otherwise redirect to appropriate home page
if($_SESSION['user_role'] == 'admin'){
header('Location: ../index.php?page=home_admin');
} else {
header('Location: ../index.php?page=home');
}
}
}
} else {
header('location: ../index.php?page=login');
}
