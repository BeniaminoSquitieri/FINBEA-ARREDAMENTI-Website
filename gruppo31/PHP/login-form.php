<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <script type="text/javascript" src="./JavaScript/login_control.js"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="form_e_titolo">
      <div class="titolo">
    <h1>Esegui il login al sito</h1>
      </div>
    <div class="form">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" id="login" target="_self" onSubmit="return validaLog(this);">
      <p>
          <label for="email">
              E-mail: <input type="email" id="email" name="email"/>
          </label>
      </p>
      <p>
          <label for="password">
              Password: <input type="password" id="password" name="password"/>
          </label>
      </p>
      <button type="submit"><strong>Login</strong></button>
      <?php echo "<p class='consiglio'>Sei nuovo? <strong><a href=' ".$_SERVER['PHP_SELF']."?registrazione=si'>Registrati!</a></strong></p>"; ?>
    </form>
    </div>
  </div>
  </body>
</html>
