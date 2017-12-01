<?php
$dbconnection = new PDO('mysql:host=localhost;dbname=ipadressen','root','');
$stmt = $dbconnection->query("SELECT ip,home FROM t_ipadress order by id");
$ipArray = $stmt -> fetchAll();
?>
