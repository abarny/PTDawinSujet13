<?php

	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['login']) AND !empty($_POST['mail']) AND !empty($_POST['mdp1']) AND !empty($_POST['md2']))
	
	{
		/*
		CREATE TABLE `validation` (
		`id` INT( 255 ) NOT NULL AUTO_INCREMENT ,
		`prenom` VARCHAR( 255 ) NOT NULL ,
		`nom` VARCHAR( 255 ) NOT NULL ,
		`login ` VARCHAR( 255 ) NOT NULL ,
		`mail` VARCHAR( 255 ) NOT NULL ,
		`pass` VARCHAR( 255 ) NOT NULL ,
		`color` INT( 255 ) NOT NULL ,	
		INDEX ( `id` )
		);
		*/
		
		mysql_connect("localhost", "root", "");
		mysql_select_db("nom_db");
		
		// sécurités
		$mdp1 = mysql_real_escape_string(htmlspecialchars($_POST['mdp1']));
		$mdp2 = mysql_real_escape_string(htmlspecialchars($_POST['mdp2']));
		
		if($mdp1 == $mdp2) {
			$prenom = mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
			$nom = mysql_real_escape_string(htmlspecialchars($_POST['nom']));
			$login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
			$mail = mysql_real_escape_string(htmlspecialchars($_POST['mail']));
			$color = mysql_real_escape_string(htmlspecialchars($_POST['color']));
			
			// Cryptage mdp
			$mdp1 = sha1($passe);
			
			mysql_query("INSERT INTO validation VALUES('', '$prenom', '$nom', '$login', '$mail', '$mdp1', '$color')");
		}
		
		else {
			echo 'Erreur : les deux mots de passe ne sont pas identiques.';
		}
	}

?>