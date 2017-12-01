
      <div id="head">
        <p id="welcome"> Herzlich Willkommen auf dem BörnBlog </p>
      </div>

      <?php include 'views/navigation.view.php' ?>

      <div id="main">
          <h3>Hier sind die Links zu den Blogs von meinen Kollegen:</h3>

          <?php include 'models/home.model.php' ?>
          <h4>Fynn:</h4>
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
