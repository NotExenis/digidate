<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
                <p class="text-danger">
                    <?php
                    if(isset($_SESSION['loginmelding'])){
                        echo $_SESSION['loginmelding'];
                        unset($_SESSION['loginmelding']);
                    }
                    ?>
                </p>
                <div class="form-group">
                    <form method="post" action="php/login.php">
                    <label for="exampleInputEmail1">Email address</label>
                    <input class="form-control" name="email"  placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" type="password"  placeholder="Enter password" name="password">
                </div>
            <a class="text-secondary"href="index.php?page=forget_password">Forgot your password? Click here</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>
