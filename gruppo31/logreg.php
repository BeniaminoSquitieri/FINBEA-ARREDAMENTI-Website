<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <link rel="stylesheet" href="logreg.css">
    <meta charset="utf-8">
    <title>Logreg</title>
  </head>
  <body>
    <?php include "./PHP/header.php"; ?>

    <?php
    if(empty($_SESSION["email"]))
    {
      if(!empty($_GET["registrazione"]) && $_GET["registrazione"]=="si")// registra
      {
        if(empty($_POST["email"]))//deve inserire i dati per registrarsi
        {
          require "./PHP/reg-form.php";
        }
        else //registra nel db
        {
          require "./PHP/reg-manager.php";
        }
      }
      else //login
      {
        if(empty($_POST["email"]))//deve inserire i dati per loggare
        {
          require "./PHP/login-form.php";
        }
        else//eseguiamo il login
        {
          require "./PHP/login-manager.php";
        }
      }
    }
    else {
      echo '<script type="text/JavaScript">
           alert("Non dovresti essere qui, hai già effettuato il login!\nSe vuoi cambiare account effettua prima il logout!");
           </script>';
      header("Refresh:0; url=./home.php");
    }
     ?>

    <?php include "footer.html"; ?>
  </body>
</html>
