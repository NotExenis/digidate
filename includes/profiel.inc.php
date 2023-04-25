<?php 
require 'private/conn.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM tbl_users WHERE user_id =:id";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':id' => $id,
));
$r = $stmt->fetch();


$sql = "SELECT `user_tags` FROM tbl_users WHERE user_id = :id ";
$stmt1 = $db->prepare($sql);
$stmt1->execute(array(
        ':id'=>$id
));
$r2 = $stmt1->fetch();

?>

<br>
<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <form method="post" action="../php/edit.php">
                <img src="data:image/png;base64, <?= $r['user_photo'] ?>" width=250 height=250>
                <input type="submit" class="btn btn-primary" name="submit" value="wijzig gegevens">

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" name="email" placeholder="Enter email"  value="<?= $r['user_email'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?= $r['user_name'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input class="form-control" name="address" placeholder="Address"  value="<?= $r['user_address'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">date of birth</label>
                    <input class="form-control" type="date" name="birthday" placeholder="Date of birth"  value="<?= $r['user_birthday'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input class="form-control" name="city" placeholder="City"  value="<?= $r['user_city'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">phone number</label>
                    <input class="form-control" name="phone" placeholder="phone number" value="<?= $r['user_phone_number'] ?>" readonly>
                </div>



            </form>
            <br>
            <p><b>Wil je je account verwijderen?</b></p>
            <form action="php/delete_account.php" method="post">
                <input type="hidden" name="id" value="<?= $r['user_id'] ?>">
                <button type="submit" onclick="return confirm('Weet u het zeker?')" class="btn btn-danger">Verwijder je account</button>
            </form>
        </div>

        <div class="col-sm">

        </div>
        <div>

            <label for="tags">Dit zijn de tags die je nu hebt:</label>

            <select name="tags">
                <option><?php echo $r2['user_tags'] ;?><br></option>
            </select>
        </div>
    </div>

</div>
