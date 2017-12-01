<?php

$dbconnection = new PDO('mysql:host=localhost;dbname=blog','root','');
$stmt = $dbconnection->query("SELECT *,  (summe_bewertungen / anzahl_bewertungen) as Durchschnitt FROM posts ORDER BY post_time desc");
$postsArray = ($stmt -> fetchAll());

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

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
