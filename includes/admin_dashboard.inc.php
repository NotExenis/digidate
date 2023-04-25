<?php
require 'private/conn.php';

$sql = "SELECT * FROM tbl_users WHERE user_role = 'admin'";
$stmt = $db->prepare($sql);
$stmt->execute();
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-">
        </div>
        <div class="col-lg">
            <form action="index.php?page=admin_add" method="post" enctype="multipart/form">
                <button type="submit" class="btn btn-primary">Add admin</button>
            </form>
            <br>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stmt as $r) { ?>
                        <tr>
                            <td><?= $r['user_name'] ?></td>
                            <td><?= $r['user_role'] ?></td>
                            <td>
                            <form action="index.php?page=admin_edit" method="POST">
                                <input type="hidden" name="admin_id" value="<?= $r['user_id'] ?>">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                            </td>
                            <td>
                            <form action="php/admin_delete.php" method="POST">
                                <input type="hidden" name="admin_id" value="<?= $r['user_id'] ?>">
                                <button onclick="return confirm('Weet u het zeker?')" type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-">
        </div>
    </div>
</div>