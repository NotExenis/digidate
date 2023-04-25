<?php
require 'private/conn.php';
$sql = 'SELECT * FROM tbl_gender';
$stmt = $db->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM tbl_tags";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();

?>

<div class="container">
    <div class="row">
        <div class="col-sm">
<<<<<<< HEAD
            <form action="" name="gender"></form>
=======

>>>>>>> 7afd344ce6fa7af6d001dbf91e3e48fa5e62d167
        </div>
        <p class="text-danger">
                    <?php
                    if(isset($_SESSION['email'])){
                        echo $_SESSION['email'];
                        unset($_SESSION['email']);
                    }
                    ?>
                </p>
        <div class="col-sm">
            <form method="POST" action="php/register.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input class="form-control"  type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password2">Confirm password</label>
                    <input class="form-control"  type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" name="confirm_password" placeholder="Confirm password">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="birthdate">date of birth</label>
                    <input id="datepicker" type="date" />
                    <script>
  // Een functie om de datum in het formaat jaar maand dag te krijgen
  function formatDate(date) {
    let year = date.getFullYear();
    let month = date.getMonth() + 1;
    let day = date.getDate();
    if (month < 10) {
      month = "0" + month;
    }
    if (day < 10) {
      day = "0" + day;
    }
    return year + "-" + month + "-" + day;
  }

  // De huidige datum krijgen
  let today = new Date();

  // De datum van 18 jaar geleden krijgen
  let minAge = new Date(today);
  minAge.setFullYear(minAge.getFullYear() - 18);

  // De datum van 100 jaar geleden krijgen
  let maxAge = new Date(today);
  maxAge.setFullYear(maxAge.getFullYear() - 120);

  // De min- en max-attributen instellen op basis van de berekende datums
  let datepicker = document.getElementById("datepicker");
  datepicker.setAttribute("min", formatDate(maxAge));
  datepicker.setAttribute("max", formatDate(minAge));
  
  // Controleer of de geselecteerde datum meer dan 18 jaar in het verleden ligt
  datepicker.addEventListener("input", function() {
    let selectedDate = new Date(datepicker.value);
    let ageDiffMs = Date.now() - selectedDate.getTime();
    let ageDate = new Date(ageDiffMs);
    let age = Math.abs(ageDate.getUTCFullYear() - 1970);
    
    if (age < 18) {
      alert("Je moet 18 jaar of ouder zijn");
      datepicker.value = "";
    }
  });
</script>

                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input class="form-control" name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <?php foreach ($stmt as $r) { ?>
                            <option name="gender" value="<?= $r['gender'] ?>"><?= $r['gender'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">phone number</label>
                    <input class="form-control" name="phone" placeholder="phone number">
                </div>
                <div class="form-group">
                    <label for="preference">preference</label>
                    <select name="preference" id="preference">
                        <?php $stmt->execute();
                        foreach ($stmt as $r) { ?>
                            <option name="preference" value="<?= $r['gender'] ?>"><?= $r['gender'] ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <!-- TODO: niet meer dan 5 selectable, wisdom met js, https://stackoverflow.com/questions/4135210/html-multiselect-limit -->
                    <!-- For windows: Hold down the control (ctrl) button to select multiple options
                        For Mac: Hold down the command button to select multiple options -->
                    <select name="tag_id[]" required multiple="multiple">
                        <?php foreach ($stmt2 as $r2) { ?>
                            <option name="tag_id[]" value="<?= $r2['tag_id'] ?>"><?= $r2['tag_name']  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" name="pic" type="file" id="formFile">
                </div>
                <div class="mb-3">

                    <div class="g-recaptcha" data-sitekey="6LdVTR0lAAAAAMHwpXU53zHmgpKdBAWgaDBCNwnd"></div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>
