<?php
$error = [
];
/*
echo 'POST: <br />';
var_dump($_POST);
echo '<hr />';
echo 'GET: <br />';
var_dump($_REQUEST);
*/
$benutzer='';
$oldpasswd='';
$newpasswd='';
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $benutzer = $_POST["user"];
    $oldpasswd = $_POST["oldpassword"];
    $newpasswd = $_POST["newpassword"];
    $groesse=strlen($oldpasswd);

    if($benutzer === '')
    {
     $error[] = '-Geben sie einen Benutzernamen an';
    }
    if($groesse < 5)
    {
      $error[] = '-Ihr Passwort ist zu kurz';
    }
    if($oldpasswd != $newpasswd)
    {
     $error[] = '-Ihr Passwort stimmt nicht überein';
    }
    $dbconnection = new PDO('mysql:host=localhost;dbname=blog','root','');
    $stmt = $dbconnection->query("SELECT count(*) FROM `user` WHERE user = '$benutzer'");
    $user_array = $stmt -> fetchAll();
    if($user_array[0][0] > 0)
    {
      $error[] = '-Der Benutzername exsistiert bereits';
    }

}
if(empty($error) && !empty($benutzer) && !empty($oldpasswd) && !empty($newpasswd))
{
$stmt = '';
$dbconnection = new PDO('mysql:host=localhost;dbname=blog','root','');
$stmt = $dbconnection->query("INSERT INTO `user`(`user`, `oldpasswd`, `newpasswd`) VALUES ('$benutzer', '$oldpasswd', '$newpasswd')");
echo ('User registriert');

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <title>BLJ-Blog</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
  <div id="wrapper">
        <div id="head">
          <p id="welcome">Benutzer anmelden</p>
        </div>

        <div id="main">
          <p><a href="../index.php"> - Zurück zur Homeseite -</a></p>

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
        </div>


</body>
</html>
