<?php 
require '../private/conn.php';

$id = $_POST['id'];
$sql = "UPDATE tbl_users
        SET user_accepted = null
        WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':id' => $id,
));
header('location: ../index.php?page=waiting_list');
?>