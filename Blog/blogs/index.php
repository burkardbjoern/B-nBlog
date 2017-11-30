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
  <div id="wrapper">
    <div id="head">
          <p id="welcome"> Blogs </p>
    </div>
    <div id="nav">
          <ul>
             <li><a href="../">Home</a></li>
          </ul>
          <ul>
             <li><a href="index.php">Einträge</a></li>
          </ul>
          <ul>
             <li><a href="../Erfassen/">Neuer Blogpost erstellen</a></li>
          </ul>
          <ul>
             <li><a href="../ip-adress/">IP-Adressen</a></li>
          </ul>
          <ul>
             <li><a href="../benutzer/">Benutzer</a></li>
          </ul>
        </div>
    <div id="main">
      <h3>Letzte Blogposts:</h3>
      <div id="Fomular">
      <?php
      $stmt = '';
      $dbconnection = new PDO('mysql:host=localhost;dbname=blog','root','');
      $stmt = $dbconnection->query("SELECT * FROM posts ORDER BY post_time desc");
        foreach ($stmt -> fetchAll() as $x) {
          ?><br /><?php
          echo 'Datum / Zeit: ' . $x["post_time"] . '<br />';
          echo 'Benutzer: ' . $x["user_name"] .  '<br />';
          echo 'Blog:<br/>' . $x["blog_post"] . '<br />' ;
          ?>
          <h4>Bewerten:</h4>
          <?php
          echo '<form action="index.php" method="post">';
          echo '<button class="btn-primary" name="horrible" type="submit">Horrible</button> <button class="btn-primary" name="meh" type="submit">Meh</button> <button class="btn-primary" name="medium" type="submit">Medium</button> <button class="btn-primary" name="good" type="submit">Good</button> <button class="btn-primary" name="godlike" type="submit">Godlike</button>'. '<br />';
          echo '<input name = "blog_nr" type="hidden" value="'. $x["blog_nr"] . '" />';
          if($x["anzahl_bewertungen"] > 0) {
             $bewertung = $x["summe_bewertungen"] / $x["anzahl_bewertungen"];
             if($bewertung < 2)
              echo 'Durchschnittsbewertung= Horrible';
             if($bewertung >=2 && $bewertung < 3)
              echo 'Durchschnittsbewertung= Meh';
             if($bewertung >=3 && $bewertung < 4)
              echo 'Durchschnittsbewertung= Medium';
             if($bewertung >=4 && $bewertung < 5)
              echo 'Durchschnittsbewertung= Good';
             if($bewertung == 5 && $bewertung > 4.7)
               echo 'Durchschnittsbewertung= Godlike';
           }
           else {
             echo 'Seien Sie der erste der bewertet! :C';
           }
          echo '</form>';
          echo '<hr />';
        }
          ?>
          <?

       ?>
     </div>
    </div>
  </div>
</body>
</html>
