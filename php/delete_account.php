<?php 
require '../private/conn.php';

$id = $_POST['id'];

$sql = "DELETE FROM tbl_users WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(array( 
    ':id' => $id,
));
session_destroy();
header("Location: ../index.php?page=logout");
?>