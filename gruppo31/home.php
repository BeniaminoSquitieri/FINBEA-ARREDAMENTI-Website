<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="home.css", type="text/css">
    <title> Fineba Home</title>
  </head>
  <body>
      <?php include "./PHP/header.php";
      if(!empty($_SESSION["email"]))
      {
        $username=$_SESSION["username"];
        echo "<p>Bentornato $username!</p>";
      } ?>
    <!-- Container delle slide -->
<div class="slideshow-container">

  <!-- immagini con tutta l'ampiezza e con il numero e il testo -->
  <div class="mySlides fade">
    <img src="./Img/Arredamento/arredamento1.jpg" style="width:100%"> <!-- aggiungere link alle pagini -->
  </div>

  <div class="mySlides fade">
    <img src="./Img/Arredamento/arredamento2.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="./Img/Arredamento/arredamento3.jpg" style="width:100%">
  </div>
  <!-- bottoni di prima e dopo per cambiare immagine -->
  <a class="prev" onclick="plusSlides(-1)">Precedente</a>
  <a class="next" onclick="plusSlides(1)">Successivo</a>
</div>
<br>

<!-- Puntini sotto le immagini -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> <!-- richiamo funzioni definite in javascript nello script sottostante -->
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>




<?php include "footer.html" ?>
  </body>
</html>



<script type="text/javascript">
  let slideIndex = 1; // immagine mostrata all'avvio della home
  showSlides(slideIndex);  /* richiamo la funzione showSlides definita dopo per mostrare le immagini*/

  // Cambio immagine
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  // anteprima controlli dell'immagine
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    // metodi interfaccia document
    let slides = document.getElementsByClassName("mySlides"); // creo variabile slide
    let dots = document.getElementsByClassName("dot"); // creo variabile dots
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
</script>
