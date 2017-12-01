<?php include 'models/passwd.model.php' ?>
      <div id="head">
        <p id="welcome">Passwort ändern</p>
      </div>

      <div id="main">
        <p><a href="index.php?page=ip-adress">zurück</a></p>

        <h3>Passwort ändern:</h3>

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
        <form action="index.php?page=passwd" method="post">
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
              <option value="Jennifer">Jennifer</option>
              <option value="raffi">Raffi</option>
              </select>
              <label class="form-label"for="oldpassword"><br />Altes Passwort</label><br />
              <input class="form-control" type="text" id="Vorname" name="oldpassword" >
              <label class="form-label"for="newpassword"><br />Neues Passwort</label><br />
              <input class="form-control" type="password" id="Vorname" name="newpassword">
                <div class="form-actions" >
                    <input id="button" action="passwd.php" type="submit" value="Passwort ändern">
                </div>
        </fieldset>
      </form>
      <div>
      </div>
