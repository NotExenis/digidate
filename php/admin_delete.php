<?php
require '../private/conn.php';
$id = $_POST['admin_id'];
$sql = "DELETE FROM tbl_users WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array(   
    ':id' => $id,
));
header('location:../index.php?page=admin_dashboard');
?>