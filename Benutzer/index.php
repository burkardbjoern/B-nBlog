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
  <?php include 'views/benutzer.view.php' ?>
</body>
</html>
