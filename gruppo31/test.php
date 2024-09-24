<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prova</title>
    <?php
      require "./SQL/query.php"
     ?>
  </head>
  <body>
    <table border="true">
			<tr>
				<th>Nome</th>
				<th>Descrizione</th>
				<th>Foto</th>
			</tr>
    <?php

    $arr=get_arredamenti();
    while($sim=pg_fetch_assoc($arr))
    {
      $mob=get_mobili($sim["nome"]);
			while($row = pg_fetch_array($mob)){
				$nome = $row["nome_mobile"];
				$descrizione = $row["descrizione"];
				$foto = $row["foto"];
				echo "<tr>
						<td>".$nome."</td>
						<td>".$descrizione."</td>
						<td>".$foto."</td>
					</tr>";
			}
    }
			echo "</table>";
      if(exist_username("foo")){
        echo "TRUE";
      }
      else {
        echo "FALSE";
      }
      echo exist_username("foo");
      if(exist_telefono("1234")){
        echo "TRUE";
      }
      else {
        echo "FALSE";
      }
      echo exist_telefono("1234");
      if(exist_email("a@wow")){
        echo "TRUE";
      }
      else {
        echo "FALSE";
      }
      echo exist_email("www");
			?>


      <h1>Parte di Login</h1>

      <form method="post" action="./PHP/login-manager.php">
    		<p>
    		<label for="email">Email
    			<input type="email" name="email" id="email"/>
    		</label>
    		</p>
    		<p>
    		<label for="password">Password
    			<input type="password" name="password" id="password"/>
    		</label>
    		</p>
    		<p>
    		<input type="submit" name="invia" value="Login"/>
    		</p>
    	</form>

      <h1>Parte registra</h1>

      <form method="post" action="./PHP/registrazione.php">
    		<p>
    		<label for="email">Email
    			<input type="email" name="email" id="email"/>
    		</label>
    		</p>
    		<p>
    		<label for="password">Password
    			<input type="password" name="password" id="password"/>
    		</label>
    		</p>




        <label for="nome">nome
    			<input type="text" name="nome" id="nome"/>
    		</label>
    		</p>
    		<p>
    		<label for="cognome">cognome
    			<input type="text" name="cognome" id="cognome"/>
    		</label>
    		</p>
        <label for="username">username
    			<input type="text" name="username" id="username"/>
    		</label>
    		</p>
    		<p>
    		<label for="sesso">sesso
    			<input type="text" name="sesso" id="sesso"/>
    		</label>
    		</p>
        <label for="telefono">telefono
    			<input type="text" name="telefono" id="telefono"/>
    		</label>
    		</p>
    		<p>
    		<label for="nascita">nascita
    			<input type="text" name="nascita" id="nascita"/>
    		</label>
    		</p>





    		<p>
    		<input type="submit" name="invia" value="registra"/>
    		</p>
    	</form>
  </body>
</html>
