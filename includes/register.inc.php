<?php
require 'private/conn.php';
$sql = 'SELECT * FROM tbl_gender';
$stmt = $db->prepare($sql);
$stmt->execute();
?>

<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <form method="POST" action="php/register.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input class="form-control" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">date of birth</label>
                    <input class="form-control" type="date" name="birthday" placeholder="Date of birth">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input class="form-control" name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gender</label>
                    <select name="gender" id="gender">
                        <?php foreach ($stmt as $r) { ?>
                            <option name="gender" value="<?= $r['gender'] ?>"><?= $r['gender'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">phone number</label>
                    <input class="form-control" name="phone" placeholder="phone number">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">preference</label>
                    <select name="preference" id="preference">
                        <?php $stmt->execute();
                        foreach ($stmt as $r) { ?>
                            <option name="preference" value="<?= $r['gender'] ?>"><?= $r['gender'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" name="pic" type="file" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>
