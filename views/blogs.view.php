
  <div id="head">
        <p id="welcome"> Blogs </p>
  </div>

  <?php include 'views/navigation.view.php' ?>

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
           if($bewertung >=4.6 && $bewertung < 5)
            echo 'Durchschnittsbewertung= Good';
           if($bewertung == 5 || $bewertung > 4.7)
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
