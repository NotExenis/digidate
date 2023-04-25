<?php 
require 'private/conn.php';

$id = $_POST['admin_id'];

$sql = "SELECT * FROM tbl_users WHERE user_id =:id";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':id' => $id,
));
$r = $stmt->fetch();
?>


<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <form method="POST" action="php/admin_edit.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" name="email" placeholder="Enter email"  value="<?= $r['user_email'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?= $r['user_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input class="form-control" name="address" placeholder="Address"  value="<?= $r['user_address'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">date of birth</label>
                    <input class="form-control" type="date" name="birthday" placeholder="Date of birth"  value="<?= $r['user_birthday'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input class="form-control" name="city" placeholder="City"  value="<?= $r['user_city'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">phone number</label>
                    <input class="form-control" name="phone" placeholder="phone number" value="<?= $r['user_phone_number'] ?>">
                </div>
                <input type="hidden" value="<?= $id ?>" name="admin_id">
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>