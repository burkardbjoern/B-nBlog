<?php include 'models/ip-adress.model.php' ?>

      <div id="head">
        <p id="welcome"> IP-Adresse für die Blogs ändern </p>
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
        <form action="index.php?page=ip-adress" method="post">
          <fieldset>
              <label class="form-label"for="name">Name:</label><br />
              <select name="friends" id="Vorname" size="1">
              <option value="null" selected>[Wähle dein Name aus]</option>
              <option value="celine">Céline</option>
              <option value="david">David</option>
              <option value="timon">Timon</option>
              <option value="bjoern">Björn</option>
              <option value="fynn">Fynn</option>
              <option value="carolina">Carolina</option>
              <option value="jennifer">Jennifer</option>
              <option value="raffi">Raffi</option>
              </select>
              <label class="form-label"for="ipadress"><br />Die IP-Adresse</label><br />
              <input class="form-control" type="text" id="Vorname" name="ipadress" value="10.20.16.">
              <label class="form-label"for="passwd"><br />Passwort</label><br />
              <input class="form-control" type="password" id="Vorname" name="passwd">
                <div class="form-actions" >
                    <input id="button" type="submit" value="IP-Adresse erneuern">
                </div>
        </fieldset>
      </form>
      <div>
      </div>
      <?php include 'models/ip-adress.part.model.php' ?>
      <p><a href="index.php?page=passwd">Persönliches Passwort ändern</a></p>
