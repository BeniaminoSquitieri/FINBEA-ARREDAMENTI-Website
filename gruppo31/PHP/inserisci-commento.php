<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <script type="text/javascript" src="./JavaScript/comment_control.js"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $username=$_SESSION["username"];
    if(empty($_POST["commento"]))
    {
      if(!exist_commento($username,$nome_arredo))
      {
     ?>
      <div class="form_e_titolo">
        <div class="titolo">
      <h1>Inserisci un tuo commento!</h1>
        </div>
      <div class="form">
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?nome_arredo="."$nome_arredo"?>" id="login" target="_self" onSubmit="return validaCommento(this);">
        <p>
            <label for="valutazione">
                Valutazione: <select name="valutazione" id="valutazione">
                  <option value=1>⭐</option>
                  <option value=2>⭐⭐</option>
                  <option value=3>⭐⭐⭐</option>
                  <option value=4>⭐⭐⭐⭐</option>
                  <option value=5>⭐⭐⭐⭐⭐</option>
                </select>
            </label>
        </p>
        <p>
            <label for="commento">
                Commento: <input type="textarea" id="commento" name="commento"/>
            </label>
        </p>
        <button type="submit"><strong>Aggiungi</strong></button>
      </form>
      </div>
    </div>
<?php
    }
  }
  else if(!exist_commento($username,$nome_arredo)){
    $testo=$_POST["commento"];
    $valutazione=$_POST["valutazione"];
    insert_commento($username,$testo,$valutazione,$nome_arredo);
  } ?>
  </body>
</html>
