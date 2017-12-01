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
    $ipadress = trim($_POST["ipadress"]);
    $passwd = $_POST["passwd"];
    $groesse = strlen($ipadress);
    if($name === 'null')
    {
     $error[] = '-Wähle einen Namen aus';
    }
    if($groesse != 12)
    {
     $error[] = '-Gib eine Korrekte IP-Adresse an';
    }
    if($name === 'timon')
    {
      $password = $passwdArray[1][0];
     if($passwd != $password)
      $error[] = '-Das Passwort für den User: Timon ist nicht korrekt';
    }
    if($name === 'bjoern')
    {
      $password = $passwdArray[3][0];
     if($passwd != $password)
      $error[] = '-Das Passwort für den User: Björn ist nicht korrekt';
    }
    if($name === 'carolina')
    {
    $password = $passwdArray[0][0];
     if($passwd != $password)
      $error[] = '-Das Passwort für den User: Carolina ist nicht korrekt';
    }
    if($name === 'david')
    {
      $password = $passwdArray[2][0];
     if($passwd != $password)
      $error[] = '-Das Passwort für den User: David ist nicht korrekt';
    }
    if($name === 'fynn')
    {
      $password = $passwdArray[4][0];
     if($passwd != $password)
      $error[] = '-Das Passwort für den User: Fynn ist nicht korrekt';
    }
    if($name === 'jennifer')
    {
      $password = $passwdArray[5][0];
     if($passwd != $password)
      $error[] = '-Das Passwort für den User: Jennifer ist nicht korrekt';
    }
    if($name === 'celine')
    {
      $password = $passwdArray[6][0];
     if($passwd != $password)
      $error[] = '-Das Passwort für den User: Céline ist nicht korrekt';
    }
    if($name === 'raffi')
    {
    $password = $passwdArray[7][0];
    if($passwd != $password)
     $error[] = '-Das alte Passwort für den User: Raffi ist nicht korrekt';
    }
   }

if(empty($error) && !empty($name) && !empty($ipadress))
{
$stmt = '';
$dbconnection = new PDO('mysql:host=localhost;dbname=ipadressen','root','');
$stmt = $dbconnection->query("UPDATE t_ipadress SET ip = '$ipadress' where name='$name'");
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
          <p id="welcome"> IP-Adresse für die Blogs ändern </p>
        </div>
        <div id="nav">
          <ul>
             <li><a href="../">Home</a></li>
          </ul>
          <ul>
             <li><a href="../blogs/">Einträge</a></li>
          </ul>
          <ul>
             <li><a href="../erfassen">Neuer Blogpost erstellen</a></li>
          </ul>
          <ul>
             <li><a href="index.php">IP-Adressen</a></li>
          </ul>
          <ul>
             <li><a href="../benutzer/">Benutzer</a></li>
          </ul>
        </div>
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
        <?php $dbconnection = new PDO('mysql:host=localhost;dbname=ipadressen','root','');

        $stmt = $dbconnection->query("SELECT * FROM t_ipadress ORDER BY name desc");
        foreach ($stmt as $x) {
          echo $x["name"] . 's ';
          echo 'IP-Adresse: ' . $x["ip"] . '<br />';
          echo '<hr />';
        }
        ?>
        <p><a href="passwd/">Persönliches Passwort ändern</a></p>
        </div>


</body>
</html>
