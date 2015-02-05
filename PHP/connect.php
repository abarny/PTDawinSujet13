<?php

	// session_start();
	
	// Connexion a la BDD
	$host = "info-arie";
	$user = "hatran";
	$pass = "9JyGX1PHZdAp";
	$bdd = "info_hatran";
	
	// Connexion
	@mysql_connect($host,$user,$pass) or die("Impossible de se connecter");
	@mysql_select_db("$bdd") or die("Impossible de se connecter");
	
	try {
		$pdo = new PDO('mysql:host=info-arie;dbname=info_hatran', 'hatran', '9JyGX1PHZdAp');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}


?>