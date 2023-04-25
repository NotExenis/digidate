<?php 
require 'private/conn.php';

$sql = 'SELECT * FROM tbl_gender';
$stmt = $db->prepare($sql);
$stmt->execute();

?>

<div class="container">
    <div class="row">
        <div class="col-sm">
        <p class="text-danger">
                    <?php
                    if(isset($_SESSION['email'])){
                        echo $_SESSION['email'];
                        unset($_SESSION['email']);
                    }
                    ?>
                </p>
        </div>
        <div class="col-sm">
            <form method="POST" action="php/admin_add.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" type="password" name="password" autocomplete="off" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input class="form-control" name="address" placeholder="Address" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">date of birth</label>
                    <input class="form-control" type="date" name="birthday" placeholder="Date of birth" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input class="form-control" name="city" placeholder="City" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">phone number</label>
                    <input class="form-control" name="phone" placeholder="phone number" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gender</label>
                    <select name="gender" id="gender">
                        <?php foreach ($stmt as $r) { ?>
                            <option name="gender" value="<?= $r['gender_id'] ?>"><?= $r['gender'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" value="<?= $id ?>" name="admin_id">
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>