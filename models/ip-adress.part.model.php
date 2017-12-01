<?php $dbconnection = new PDO('mysql:host=localhost;dbname=ipadressen','root','');

$stmt = $dbconnection->query("SELECT * FROM t_ipadress ORDER BY name desc");
foreach ($stmt as $x) {
  echo $x["name"] . 's ';
  echo 'IP-Adresse: ' . $x["ip"] . '<br />';
  echo '<hr />';
}
?>
