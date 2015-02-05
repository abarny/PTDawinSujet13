<?php

	// session_start();
	
	// Connexion a la BDD
	$host = "localhost";
	$user = "root";
	$pass = "";
	$bdd = "teamshare";
	
	// Connexion
	@mysql_connect($host,$user,$pass) or die("Impossible de se connecter");
	@mysql_select_db("$bdd") or die("Impossible de se connecter");

?>