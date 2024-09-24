<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src="./JavaScript/form_control.js"></script>
    <title></title>
  </head>
  <body>
    <div class="form_e_titolo">
      <div class="titolo">
        <h1>Registrati al sito</h1>
      </div>
      <div class="form">
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?registrazione=si" ?>" id="registration" target="_self" onSubmit="return validaModulo(this);">
          <p>
              <label for="nome">
                  Nome:<input type="text" id="nome" name="nome"/>
              </label>
          </p>
          <p>
              <label for="cognome">
                   Cognome:<input type="text" id="cognome" name="cognome"/>
              </label>
          </p>
          <p>
              <label for="sesso">
                   Sesso: <br> <input type="radio" id="maschio" name="sesso" value="M" checked /> Uomo
                  <input type="radio" id="femmina" name="sesso" value="F"/> Donna
              </label>
          </p>
          <p>
              <label for="nascita">
                  Data di nascita:<input type="date"
                    id="nascita" name="nascita"/>
              </label>
          </p>
          <p>
              <label for="telefono">
                   Telefono:<input type="tel" id="telefono" name="telefono"/>
              </label>
          </p>
          <p>
              <label for="username">
                   Username*:<input type="text" id="username" name="username"/>
              </label>
          </p>
          <p>
              <label for="email">
                   E-mail*:<input type="email" id="email" name="email"/>
              </label>
          </p>
          <p>
              <label for="password">
                  Password*:<input type="password" id="password" name="password"/>
              </label>
          </p>
          <p>
              <label for="password_conf">
                   Conferma password*:<input type="password" id="password_conf" name="password_conf"/>
              </label>
          </p>
          <p class="obligatorio"><strong>* Campo obligatorio.</strong></p>
          <button type="submit"><strong>Registrati</strong></button>
        </form>
      </div>
    </div>
  </body>
</html>
