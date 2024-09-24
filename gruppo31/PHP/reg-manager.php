<?php
require "./SQL/query.php";

$email=$_POST["email"];
$password=$_POST["password"];
$password_conf=$_POST["password_conf"];
$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
$username=$_POST["username"];
$sesso=$_POST["sesso"];
$telefono=$_POST["telefono"];
$nascita=$_POST["nascita"];

if($password!=$password_conf){
  echo '<script type="text/JavaScript">
       alert("Password di conferma diversa, riprovare");
       </script>';
       header("Refresh:0; url=./logreg.php?registrazione=si");
}
else if(exist_email($email)){
  echo '<script type="text/JavaScript">
       alert("Email già utilizzata,inseriscine un\'altra");
       </script>';
       header("Refresh:0; url=./logreg.php?registrazione=si");
}
else if(exist_username($username)){
  echo '<script type="text/JavaScript">
       alert("Username già utilizzato,inseriscine un altro");
       </script>';
       header("Refresh:0; url=./logreg.php?registrazione=si");
}
else{
  if(insert_utente($email,$password,$nome,$cognome,$username,$sesso,$telefono,$nascita)){
    echo '<script type="text/JavaScript">
         alert("Iscrizione completata con successo, sarai riportato alla pagina di login appena chiusa questa finestra...");
         </script>';
    header("Refresh:0; url=./logreg.php");
  }
  else{
    echo '<script type="text/JavaScript">
         alert("Errore durante la registrazione. Riprova");
         </script>';
    header("Refresh:0; url=./logreg.php?registrazione=si");
  }
}
?>
