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
        $username=get_username($email);
        $_SESSION["username"]=$username;
        echo "<div class='avviso'>
          <p><strong>Benvenuto $username!</strong></br>Ora verrai riportato alla home...</p>
        </div>";
        header("Refresh:2; url=./home.php");
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
