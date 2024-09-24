<?php
	session_start();

	$name=session_name();
	$_SESSION = array();
	session_destroy();
	
	if (isset($_COOKIE['login'])) {
		setcookie($name,'', time()-3600,'/');
	}
	header("Refresh:0; url=../home.php");
?>
