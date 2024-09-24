<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <link rel="stylesheet" href="gallery.css">
    <meta charset="utf-8">
    <title>Gallery</title>
  </head>
  <body class="Gallery">
    <?php include "./PHP/header.php" ?>

    <?php
    if(!empty($_SESSION["username"]))
    {
      require "./SQL/query.php";
      $arred=get_arredamenti();
      echo "<div class= 'container'>";
      while($row=pg_fetch_assoc($arred))
          {
            $nome_arredo=$row["nome"];
            $foto_arredo=$row["foto"];
              $slogan_arredo=$row["slogan"];
              echo "
            <div class='collezioni' >
              <div class='immagine'>
                  <a href='composizione.php?nome_arredo=$nome_arredo'><img class='img' src='./Img/Arredamento/$foto_arredo'></a>
              </div>
              <div class='Titolo'>
                  <div class='slogan'>
                  <h2>$nome_arredo</h2>
                  </div>
                <h4> $slogan_arredo</h4>
              </div>
            </div>";
          }
          echo "</div>";
    }
    else {
      ?>
      <div class="avviso">
        <p>Per poter visualizzare i contenuti di questa pagina devi prima effettuare il <strong><a href="logreg.php">Login!</a></strong></p>
      </div>
      <?php
    }
     ?>
    <?php include "footer.html" ?>
  </body>
</html>
