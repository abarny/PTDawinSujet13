<?php

	// Connexion a la BDD
	$host = "127.0.0.1";
	$user = "root";
	$pass = "";
	$base = "teamshare";

	// Connexion
	@mysql_connect($host,$user,$pass) or die("Impossible de se connecter");
	@mysql_select_db("$bdd") or die("Impossible de se connecter");

?>