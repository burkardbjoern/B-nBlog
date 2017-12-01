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
$name='';
$ipadress='';
$passwd='';

$dbconnection = new PDO('mysql:host=localhost;dbname=ipadressen','root','');
$stmt = $dbconnection->query("SELECT passwd FROM t_passwd order by ID");
$passwdArray = $stmt -> fetchAll();
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $_POST["friends"];
    $oldpasswd = $_POST["oldpassword"];
    $newpasswd = $_POST["newpassword"];
    if($name === 'null')
    {
     $error[] = '-Wähle einen Namen aus';
    }
    if($name === 'timon')
    {
     $password = $passwdArray[1][0];
     if($oldpasswd != $password)
      $error[] = '-Das alte Passwort für den User: Timon ist nicht korrekt';
    }
    if($name === 'bjoern')
    {
     $password = $passwdArray[3][0];
     if($oldpasswd != $password)
      $error[] = '-Das alte Passwort für den User: Björn ist nicht korrekt';
    }
    if($name === 'carolina')
    {
     $password = $passwdArray[0][0];
     if($oldpasswd != $password)
      $error[] = '-Das alte Passwort für den User: Carolina ist nicht korrekt';
    }
    if($name === 'david')
    {
     $password = $passwdArray[2][0];
     if($oldpasswd != $password)
      $error[] = '-Das alte Passwort für den User: David ist nicht korrekt';
    }
    if($name === 'fynn')
    {
     $password = $passwdArray[4][0];
     if($oldpasswd != $password)
      $error[] = '-Das alte Passwort für den User: Fynn ist nicht korrekt';
    }
    if($name === 'jennifer')
    {
     $password = $passwdArray[5][0];
     if($oldpasswd != $password)
      $error[] = '-Das alte Passwort für den User: Jennifer ist nicht korrekt';
    }
    if($name === 'celine')
    {
     $password = $passwdArray[6][0];
     if($oldpasswd != $password)
      $error[] = '-Das alte Passwort für den User: Céline ist nicht korrekt';
    }
    if($name === 'raffi')
    {
     $password = $passwdArray[7][0];
     if($oldpasswd != $password)
      $error[] = '-Das alte Passwort für den User: Raffi ist nicht korrekt';
    }
}
if(empty($error) && !empty($name) && !empty($oldpasswd) && !empty($newpasswd))
{
$stmt = '';
$dbconnection = new PDO('mysql:host=localhost;dbname=ipadressen','root','');
$stmt = $dbconnection->query("UPDATE t_passwd SET passwd = '$newpasswd' where name='$name'");
echo 'Erfolgreich geändert';
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <title>BLJ-Blog</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
  <div id="wrapper">
        <div id="head">
          <p id="welcome">Passwort ändern</p>
        </div>

        <div id="main">
          <p><a href="../index.php">zurück</a></p>

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
          <form action="index.php" method="post">
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
        </div>


</body>
</html>
