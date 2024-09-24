<?php
  require "./SQL/query.php";

  if(true){
    $email =  $_POST['email'];
    $password =  $_POST['password'];

    $hash = get_password($email);

    if(!exist_email($email)){
      echo '<script type="text/JavaScript">
           alert("L\'utente non esiste. Riprova o iscriviti...");
           </script>';
      header("Refresh:0; url=./logreg.php");

    }
    else{
      if(password_verify($password, $hash)){
        $_SESSION["email"]=$email;
        $_SESSION["username"]=get_username($email);
        header('Location:./home.php');
      }
      else{
        echo '<script type="text/JavaScript">
             alert("Email o password errati. Riprovare...");
             </script>';
        header("Refresh:0; url=./logreg.php");
      }
    }
  }
?>
