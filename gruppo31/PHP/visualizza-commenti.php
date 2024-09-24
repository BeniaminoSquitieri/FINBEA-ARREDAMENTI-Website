<?php
  $commenti=get_commenti($nome_arredo);

  echo "<div class='commenti'>";
  while($row = pg_fetch_assoc($commenti))
  {
    $utente=$row["username"];
    $testo=$row["testo"];
    $valutazione=$row["valutazione"];

    ?>
    <div class='utente_valutazione'>
      <div class="utente">
        <?php echo "<h1>$utente</h1>"; ?>
      </div>
      <div class="valutazione">
        <p>
        <?php
        for ($i=0; $i < $valutazione; $i++) {
          echo"⭐";
        }
         ?>
         </p>
      </div>
    </div>
    <div class="testo">
      <?php echo "<p>$testo</p>"; ?>
    </div>
    <?php
  }
  echo "</div>";
 ?>
