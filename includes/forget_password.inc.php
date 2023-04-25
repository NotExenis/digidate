<div class="container d-flex justify-content-center mt-5 pt-5">

    <div class="card mt-5" style="width:500px">

        <div class="card-header">

            <h1 class="text-center">Get a reset password link</h1>

        </div>

        <div class="card-body">

            <form action="../php/check_email.php" method="post">

                <div class="mt-4">

                    <label for="email">Email:</label>

                    <input type="email" name="email" class="form-control" placeholder="Typ in your email address" required>

                </div>

                <div class="mt-4 text-end">

                    <input type="submit" name="send-link" class="btn btn-primary" value="Reset password">

                    <a href="index.php" class="btn btn-danger">Back</a>

                </div>

            </form>

        </div>

    </div>

</div>