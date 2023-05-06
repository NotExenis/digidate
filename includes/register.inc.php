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

        </div>
        <div class="col-sm">
            <form method="POST" action="php/register.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password1">Password</label> P@ssword!@1
                    <input class="form-control" type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" name="password" placeholder="Password">
                    <?php

                    if(isset($_SESSION['password_error']) && $_SESSION['password_error'] === true) {
                        echo '<p class="error">Password is incorrect</p>';
                        unset($_SESSION['password_error']);
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm password</label> P@ssword!@1
                    <input class="form-control"  type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" name="confirm_password" placeholder="Confirm password">
                </div>
                <div class="form-group">


                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name">
                    <?php

                    if(isset($_SESSION['name_error']) && $_SESSION['name_error'] === true) {
                        echo '<p class="error">Fill in your name..</p>';
                        unset($_SESSION['name_error']);
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label for="birthdate">date of birth</label>
                    <input id="datepicker" name="birthday" type="date" />
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
      alert("You need to be 18 years or older");
      datepicker.value = "";
    }
  });
</script>

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
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
                <script>
                // gebruiker moet wel toestemming geven voor waar hij of zij is
                //if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            // afstand wordt opgeslagen in latitude enn longitude

                            document.getElementById('latitude').value = position.coords.latitude;
                            document.getElementById('longitude').value = position.coords.longitude;
                        }, function(error) {
                            console.error('location error bericht: ' + error.code + ': ' + error.message);
                        });
                    } else {
                        console.error('Location is not supported by your browser.');
                    }
                </script>

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

                        <label>
                            <input type="checkbox" name="likes[]" value="Anime"> Anime
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Avontuur"> Avontuur
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Boeken"> Boeken
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Netflix"> Netflix
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Politiek"> Politiek
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Anime"> Anime
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Avontuur"> Avontuur
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Bier"> Bier
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Boeken"> Boeken
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Camperen"> Camperen
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Comedie"> Comedie
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Concerten"> Concerten
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Dieren"> Dieren
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Eten"> Eten
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Familie"> Familie
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Feesten"> Feesten
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Gamen"> Gamen
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="God"> God
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Gym"> Gym
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Koken"> Koken
                        </label>
                        <label>
                            <input type="checkbox" name="likes[]" value="Muziek"> Muziek
                        </label>


                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Your best profile picture!</label>
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
