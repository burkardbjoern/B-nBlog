<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $dbconnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
  $id = $_POST["blog_nr"] ?? '';
  if(isset($_POST["horrible"])){
    $bewertung= "Horrible";
  }
  if(isset($_POST["meh"])){
    $bewertung= "Meh";
  }
  if(isset($_POST["medium"])){
    $bewertung= "Medium";
  }
  if(isset($_POST["good"])){
    $bewertung= "Good";
  }
  if(isset($_POST["godlike"])){
    $bewertung= "Godlike";
  }

  if($bewertung == "Horrible"){
      $stmt = $dbconnection->query("UPDATE posts SET summe_bewertungen = summe_bewertungen +1 WHERE blog_nr ='$id'");
      $stmt1 = $dbconnection->query("UPDATE posts SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE blog_nr ='$id'");
  }
  if($bewertung == "Meh"){
      $stmt = $dbconnection->query("UPDATE posts SET summe_bewertungen = summe_bewertungen +2 WHERE blog_nr ='$id'");
      $stmt1 = $dbconnection->query("UPDATE posts SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE blog_nr ='$id'");
  }
  if($bewertung == "Medium"){
      $stmt = $dbconnection->query("UPDATE posts SET summe_bewertungen = summe_bewertungen +3 WHERE blog_nr ='$id'");
      $stmt1 = $dbconnection->query("UPDATE posts SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE blog_nr ='$id'");
  }
  if($bewertung == "Good"){
      $stmt = $dbconnection->query("UPDATE posts SET summe_bewertungen = summe_bewertungen +4 WHERE blog_nr ='$id'");
      $stmt1 = $dbconnection->query("UPDATE posts SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE blog_nr ='$id'");
  }
  if($bewertung == "Godlike"){
      $stmt = $dbconnection->query("UPDATE posts SET summe_bewertungen = summe_bewertungen +5 WHERE blog_nr ='$id'");
      $stmt1 = $dbconnection->query("UPDATE posts SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE blog_nr ='$id'");
  }

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
