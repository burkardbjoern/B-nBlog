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
$blog='';


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $benutzer = $_POST["benutzer"];
    $passwd = $_POST["passwd"];
    $blog = trim($_POST["eintrag"]);

    $dbconnection = new PDO('mysql:host=localhost;dbname=blog','root','');
    $stmt = $dbconnection->query("SELECT count(*) FROM `user` WHERE user = '$benutzer'");
    $user_array = $stmt -> fetchAll();
    if($user_array[0][0] < 1)
    {
      $error[] = '-Der Benutzername exsistiert nicht';
    }
    $stmt = $dbconnection->query("SELECT passwd FROM user WHERE name ='$benutzer'");
    $passwdArray = $stmt -> fetchAll();
    if($passwdArray[0][0] != $passwd) {
      $error[] = '-Das Passwort für diesen User ist nicht korrekt';
    }

    if($benutzer === '')
    {
     $error[] = '-Geben sie einen Benutzernamen an';
    }
    if($blog === '')
    {
     $error[] = '-Ihr aktueller Post ist noch nicht mit Zeichen gefüllt';
    }
    if($blog !== '')
    {
      if(strpos($blog, ' ') === false)
      {
        $error[] = '-Ihr Text enthält keine Leerzeichen';
      }
    }

}
if(empty($error) && !empty($benutzer) && !empty($blog))
{
$blog = nl2br($blog);
$blog = strip_tags($blog, '<img><a><br>');
$benutzer = htmlspecialchars($benutzer);
$stmt = '';
$dbconnection = new PDO('mysql:host=localhost;dbname=blog','root','');
$stmt = $dbconnection->query("INSERT INTO posts(user_name,blog_post,post_time) VALUES ('$benutzer','$blog',curtime())");
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
          <p id="welcome"> Eintrag erfassen </p>
        </div>
        <div id="nav">
          <ul>
             <li><a href="../">Home</a></li>
          </ul>
          <ul>
             <li><a href="../blogs/">Einträge</a></li>
          </ul>
          <ul>
             <li><a href="index.php">Neuer Blogpost erstellen</a></li>
          </ul>
          <ul>
             <li><a href="../ip-adress/">IP-Adressen</a></li>
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
                <label class="form-label"for="benutzername">Benutzername:</label><br />
                <input placeholder="Benutzername"class="form-control" type="text" id="Vorname" name="benutzer" value="<?php echo $benutzer?>"><br />
                <label class="form-label"for="passwd">Passwort:</label><br />
                <input placeholder="Passwort"class="form-control" type="password" id="Vorname" name="passwd">
                <label class="form-label"for="eintrag"><br />Ihr Eintrag:</label><br />
                <textarea placeholder="<Titel>"name="eintrag"></textarea>
                  <div class="form-actions" >
                      <input id="button" type="submit" value="Abschicken">
                  </div>
          </fieldset>
        </form>
        </div>

</body>
</html>
