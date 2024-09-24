<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <link rel="stylesheet" href="composizione.css">
    <meta charset="utf-8">
    <title>Composizione</title>
  </head>
  <body>
    <?php
    include "./PHP/header.php";
    require "./SQL/query.php";
    if(!empty($_SESSION["username"]))
    {
      if(!empty($_GET["nome_arredo"]))
      {
        $nome_arredo=$_GET["nome_arredo"];
        $arredamento=get_arredamento($nome_arredo);
        $row=pg_fetch_assoc($arredamento);
        $descrizione_arredo=$row["descrizione"];
        $foto_arredo=$row["foto"];
        $slogan_arredo=$row["slogan"];

        echo "<div class='Arredamento' >
      <div class='Titolo'>
        <h2>$nome_arredo</h2>
      </div>
          <div class='immagine'>
          <img class='img' src='./Img/Arredamento/$foto_arredo'>
        </div>
        <div class='Descrizione'>
          <h4>$slogan_arredo</h4>
          <p>$descrizione_arredo</p>
        </div>
      </div>";
      echo "<div class='body-container' >";

        $mob=get_mobili($nome_arredo);
  			while($row = pg_fetch_array($mob))
        {
  				$nome_mobile = $row["nome_mobile"];
  				$descrizione_mobile = $row["descrizione"];
  				$foto_mobile = $row["foto"];

          echo "
          <div class='Mobile' >
            <div class= 'colonna'>
             <div class='immagine'>
               <img class='img' src='./Img/Mobile/$foto_mobile' >
               <h2>$nome_mobile</h2>
             </div>
            </div>
             <div class='Descrizione'>
               <p>$descrizione_mobile</p>
             </div>
           </div>";
        }
        echo " </div>";
      }
      else {
        echo "<h3>Non hai scelto nessun arredamento, verrai rispedito alla gallery</h3>";
        header("Refresh:0; url=gallery.php");
      }
    }
    else {
      ?>
        <div class="avviso">
          <p>Per poter visualizzare i contenuti di questa pagina devi prima effettuare il <strong><a href="logreg.php">Login!</a></strong></p>
        </div>
      <?php
    }

    include './PHP/inserisci-commento.php';

    include './PHP/visualizza-commenti.php';

    include "footer.html"; ?>
  </body>
</html>
