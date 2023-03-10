<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            <form action="php/login.php" method="POST">
            <p class="text-danger">
                    <?php
                    if(isset($_SESSION['accepted'])){
                      echo $_SESSION['accepted'];
                      unset($_SESSION['accepted']);
                    }
                    ?>
                  </p>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input class="form-control" name="email"  placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" type="password" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm">
            
        </div>
    </div>
</div>