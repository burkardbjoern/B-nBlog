<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <title>BLJ-Blog</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
  <div id="wrapper">
        <div id="head">
          <p id="welcome"> Herzlich Willkommen auf dem BörnBlog </p>
        </div>
        <div id="nav">
          <ul>
             <li><a href="index.php">Home</a></li>
          </ul>
          <ul>
             <li><a href="blogs/">Einträge</a></li>
          </ul>
          <ul>
             <li><a href="erfassen/">Neuer Blogpost erstellen</a></li>
          </ul>
          <ul>
             <li><a href="ip-adress/">IP-Adressen</a></li>
          </ul>
          <ul>
             <li><a href="benutzer/">Benutzer erstellen</a></li>
          </ul>
        </div>
        <div id="main">
            <h3>Hier sind die Links zu den Blogs von meinen Kollegen:</h3>
            <?php
              $dbconnection = new PDO('mysql:host=10.20.16.102;dbname=ipadressen','DB_BLJ','BLJ12345l');
            ?>
            <h4>Fynn:</h4>
            <?php
            $stmt = $dbconnection->query("SELECT ip,home FROM t_ipadress order by id");
            $ipArray = $stmt -> fetchAll();
            ?>


            <p><a href="http://<?php echo $ipArray[2][0] ?><?php echo $ipArray[2][1] ?>">Fynnus Blogus</a></p>
            <h4>Carolina:</h4>
            <p><a href="http://<?php echo $ipArray[1][0]?><?php echo $ipArray[1][1] ?>">Carolina's Blog</a></p>
            <h4>Raffaele:</h4>
            <p><a href="http://<?php echo $ipArray[7][0]?><?php echo $ipArray[7][1] ?>">RBWS</a></p>
            <h4>David:</h4>
            <p><a href="http://<?php echo $ipArray[0][0]?><?php echo $ipArray[0][1] ?>">Ein Blog der dein Leben verändert</a></p>
            <h4>Céline</h4>
            <p><a href="http://<?php echo $ipArray[3][0]?><?php echo $ipArray[3][1] ?>">Céline's Blog</a></p>
            <h4>Jennifer:</h4>
            <p><a href="http://<?php echo $ipArray[4][0]?><?php echo $ipArray[4][1] ?>">Jennifers Blog</a></p>
            <h4>Timon:</h4>
            <p><a href="http://<?php echo $ipArray[5][0]?><?php echo $ipArray[5][1] ?>">Timon's Blog</a></p>
        </div>
  </div>
<!--
  <script type="text/javascript">
    jQuery(document).ready(function($) {
        var stickyHeaderTop = $('#nav').offset().top;
        $(window).scroll(function(){ /*header-menu-wrap*/
            if( $(window).scrollTop() > stickyHeaderTop ) {
              $('#nav').addClass("sticky-menu");
            } else {
            $('#nav').removeClass("sticky-menu");
            }
        });
  });
</script> -->
</body>
</html>
