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
