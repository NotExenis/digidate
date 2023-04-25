<?php
session_start();
require '../private/conn.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM tbl_users WHERE user_id =:id";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':id' => $id,
));
$r = $stmt->fetch();
?>
<form method="post" action="../php/edit_user.php">
email:<input type="email" name="user_email" value="<?php echo $r['user_email'] ?>"><br>
name:<input type="text" name="user_name" value="<?php echo $r['user_name'] ?>"><br>
address:<input type="text" name="user_address" value="<?php echo $r['user_address'] ?>"><br>
birthday:<input type="date" name="user_birthday" value="<?php echo $r['user_birthday'] ?>"><br>
    city:<input type="text" name="user_city" value="<?php echo $r['user_city'] ?>"><br>
   phone number: <input type="text" name="user_phone_number" value="<?php echo $r['user_phone_number'] ?>"><br>
    <input type="submit" name="submit" value="Wijzig gegevens">


</form>N
