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
    $groesse = strlen($blog);

    if($groesse > 800)
    {
      $zuviel=$groesse-800;
    }

    $dbconnection = new PDO('mysql:host=localhost;dbname=blog','root','');
    $stmt = $dbconnection->query("SELECT user FROM user WHERE user ='$benutzer'");
    $user_array = $stmt -> fetchAll();
    error_reporting(0);
    if($user_array[0][0] != $benutzer)
    {
      $error[] = '-Der Benutzername existiert nicht';
    }
    $stmt = $dbconnection->query("SELECT oldpasswd FROM user WHERE user ='$benutzer'");
    $user_array = $stmt -> fetchAll();
    error_reporting(0);
    if($user_array[0][0] != $passwd)
    {
      $error[] = '-Das Passwort ist falsch';
    }
    if($groesse > 800)
    {
      $error[] = '-Der Blogeintrag ist zu lange';
      $error[] = "-Die max. Länge beträgt 800 Zeichen, dein Blogeintrag beträgt $groesse Zeichen dies sind $zuviel zuviel !!";
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
