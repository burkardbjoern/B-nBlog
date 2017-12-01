
      <div id="head">
        <p id="welcome">Benutzer anmelden</p>
      </div>

      <?php include 'views/navigation.view.php' ?>

      <div id="main">


        <h3>Benutzer anmelden:</h3>

        <?php
                if(!empty($error)) {
        ?>


        <div id="Fehler">
          <ul>
            <?php
              foreach ($error as $ausgabe)
                echo'<li>'. $ausgabe . '</li>';
            ?>
          </ul>
          </div>
          <?php
        }

           ?>
        <form action="index.php" method="post">
          <fieldset>
              <label class="form-label"for="user">Benutzername:</label><br />
              <input placeholder="Benutzername"class="form-control" type="text" id="Vorname" name="user" value="">
              <label class="form-label"for="oldpassword"><br />Passwort</label><br />
              <input class="form-control" type="password" id="Vorname" name="oldpassword" >
              <label class="form-label"for="newpassword"><br />Passwort bestätigen</label><br />
              <input class="form-control" type="password" id="Vorname" name="newpassword">
                <div class="form-actions" >
                    <input id="button" action="passwd.php" type="submit" value="Benutzer aktivieren">
                </div>
        </fieldset>
      </form>
      <div>
      </div>
