<?php

if(empty($_SESSION['username']))
{
  echo "<toolbar>
      <div class='toolbar'>
  <ul>
    <li><a href='home.php'>Home</a></li>
    <li><a href='gallery.php'>Gallery</a></li>
    <li><a href='chi_siamo.php'>Chi siamo</a></li>
    <li id=log_dx><a class='attivo' href='logreg.php'>Accedi</a></li>
  </ul>
  </div>
    </toolbar>";
}
else {
  echo "<toolbar>
      <div class='toolbar'>
  <ul>
    <li><a href='home.php'>Home</a></li>
    <li><a href='gallery.php'>Gallery</a></li>
    <li><a href='chi_siamo.php'>Chi siamo</a></li>
    <li id=log_dx><a class='attivo' href='./PHP/logout.php'>Logout</a></li>
  </ul>
  </div>
    </toolbar>";
}

 ?>
<!-- <div class='toolbar'>
  <ul>
    <li><a href='#home'>Home</a></li>
    <li><a href='#gallery'>Gallery</a></li>
    <li><a href='#chi_siamo'>Chi siamo</a></li>
    <li id=log_dx><a href='#login' >Accedi</a></li>
  </ul>
  </div> -->
