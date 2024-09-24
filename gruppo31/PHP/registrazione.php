<?php
require "../SQL/query.php";

$email=$_POST["email"];
$password=$_POST["password"];
$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
$username=$_POST["username"];
$sesso=$_POST["sesso"];
$telefono=$_POST["telefono"];
$nascita=$_POST["nascita"];

if(exist_email($email)){
  echo '<script type="text/JavaScript">
       alert("Email già utilizzata,inseriscine un\'altra");
       </script>';
}
else if(exist_username($username)){
  echo '<script type="text/JavaScript">
       alert("Username già utilizzato,inseriscine un altro");
       </script>';
}
else{
  if(insert_utente($email,$password,$nome,$cognome,$username,$sesso,$telefono,$nascita)){
    echo "<p>Iscrizione completata con successo, tra pochi secondi sarai riportato alla pagina di login... </p>";
    header("Refresh:5; url=../logreg.php");
  }
  else{
    echo "<p> Errore durante la registrazione. Riprova</p>";
  }
}

?>
