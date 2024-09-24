<?php
  function get_mobili($arredamento){
    require "logindb.php";

    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_mobili_di_arredamento="SELECT M.nome_mobile, M.descrizione, M.foto
    FROM mobile M, arredamento A
    WHERE M.nome_arredamento=$1 and A.nome=$1";

    $prep = pg_prepare($db, "mobili", $query_mobili_di_arredamento); # creazione statement con i parametri indicati

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "mobili", array($arredamento)); #esecuzione statement
    pg_close($db);

    if(!$ret){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      return $ret;
    }
  }

  function get_arredamenti(){
    require "logindb.php";

    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_arredamenti="SELECT *
    FROM arredamento";
    $ret = pg_query($db,$query_arredamenti);
    pg_close($db);

    if(!$ret){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      return $ret;
    }
  }

  function get_arredamento($arredamento){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_cerca_arredamento="SELECT *
    FROM arredamento
    WHERE nome=$1";
    $prep = pg_prepare($db, "arredamento", $query_cerca_arredamento);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "arredamento", array($arredamento));
    pg_close($db);

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      return $ret;
    }
  }

  function exist_username($usr){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_cerca_utente="SELECT *
    FROM utente WHERE username=$1";
    $prep = pg_prepare($db, "username", $query_cerca_utente);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "username", array($usr));
    pg_close($db);

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      if ($row = pg_fetch_assoc($ret)){
        return true;
      }
      else{
        return false;
      }
    }
  }

  function exist_email($email){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_cerca_email="SELECT *
    FROM utente
    WHERE email=$1";
    $prep = pg_prepare($db, "email", $query_cerca_email);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "email", array($email));
    pg_close($db);

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      if ($row = pg_fetch_assoc($ret)){
        return true;
      }
      else{
        return false;
      }
    }
  }

  function get_password($email){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_cerca_password="SELECT password
    FROM utente
    WHERE email=$1";
    $prep = pg_prepare($db, "password", $query_cerca_password);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "password", array($email));
    pg_close($db);

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      if ($row = pg_fetch_assoc($ret)){
        $psw = $row['password'];
        return $psw;
      }
      else{
        return false;
      }
    }
  }

  function get_username($email){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_cerca_username="SELECT username
    FROM utente
    WHERE email=$1";
    $prep = pg_prepare($db, "user", $query_cerca_username);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "user", array($email));
    pg_close($db);

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      if ($row = pg_fetch_assoc($ret)){
        $user = $row['username'];
        return $user;
      }
      else{
        return false;
      }
    }
  }

  function insert_utente($email,$psw,$nome,$cognome,$usr,$sesso,$telefono,$nascita){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $hash=password_hash($psw,PASSWORD_DEFAULT);
    $query_inserisci_utente="INSERT INTO utente(email,password,nome,cognome,username,sesso,telefono,nascita) VALUES ($1,$2,$3,$4,$5,$6,$7,$8)";
    $prep = pg_prepare($db, "ins_ut", $query_inserisci_utente);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    if($nome==""){
      $nome=NULL;
    }

    if($cognome==""){
      $cognome=NULL;
    }

    if($sesso==""){
      $sesso=NULL;
    }

    if($telefono==""){
      $telefono=NULL;
    }

    if($nascita==""){
      $nascita=NULL;
    }

    $ret = pg_execute($db, "ins_ut", array($email,$hash,$nome,$cognome,$usr,$sesso,$telefono,$nascita));

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      pg_close($db);
      return false;
    }
    else {
      pg_close($db);
      return true;
    }

  }

  function insert_commento($usr,$testo,$valutazione,$arredamento){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_inserisci_commento="INSERT INTO commento(username,testo,valutazione,arredamento) VALUES ($1,$2,$3,$4)";
    $prep = pg_prepare($db, "ins_comm", $query_inserisci_commento);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "ins_comm", array($usr,$testo,$valutazione,$arredamento));

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      pg_close($db);
      return false;
    }
    else {
      pg_close($db);
      return true;
    }
  }

  function get_commenti($arredamento){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_cerca_commenti="SELECT *
    FROM commento
    WHERE arredamento=$1";
    $prep = pg_prepare($db, "commenti", $query_cerca_commenti);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "commenti", array($arredamento));
    pg_close($db);

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      return $ret;
    }
  }

  function exist_commento($usr,$arredamento){
    require "logindb.php";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

    $query_cerca_commento="SELECT *
    FROM commento
    WHERE username=$1 and arredamento=$2";
    $prep = pg_prepare($db, "com", $query_cerca_commento);

    if(!$prep){
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }

    $ret = pg_execute($db, "com", array($usr,$arredamento));
    pg_close($db);

    if(!$ret) {
      echo "ERRORE QUERY: " . pg_last_error($db);
      return false;
    }
    else{
      if ($row = pg_fetch_assoc($ret)){
        return true;
      }
      else{
        return false;
      }
    }
  }

?>
