
      <div id="head">
        <p id="welcome"> Eintrag erfassen </p>
      </div>
      <?php include 'views/navigation.view.php' ?>
      <div id="main">
        <h3>Neuer Eintrag verfassen:</h3>
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
              <label class="form-label"for="benutzername">Benutzername:</label><br />
              <input placeholder="Benutzername"class="form-control" type="text" id="Vorname" name="benutzer" value="<?php echo $benutzer?>"><br />
              <label class="form-label"for="passwd">Passwort:</label><br />
              <input placeholder="Passwort"class="form-control" type="password" id="Vorname" name="passwd">
              <label class="form-label"for="eintrag"><br />Ihr Eintrag:</label><br />
              <textarea placeholder="<Titel>"name="eintrag"><?php echo $blog?></textarea>
                <div class="form-actions" >
                    <input id="button" type="submit" value="Abschicken">
                </div>
        </fieldset>
      </form>
