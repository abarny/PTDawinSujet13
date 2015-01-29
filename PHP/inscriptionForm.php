<?php

	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['mail']) AND !empty($_POST['mdp1']) AND !empty($_POST['md2']))
	
	{
		
		// Connexion a la BDD
		$host = "info-arie";
		$user = "hatran";
		$pass = "9JyGX1PHZdAp";
		$bdd = "info_hatran";
	
		// Connexion
		@mysql_connect($host,$user,$pass) or die("Impossible de se connecter");
		@mysql_select_db("$bdd") or die("Impossible de se connecter");
		
		// Sécurités
		$mdp1 = mysql_real_escape_string(htmlspecialchars($_POST['mdp1']));
		$mdp2 = mysql_real_escape_string(htmlspecialchars($_POST['mdp2']));
		
		if($mdp1 == $mdp2) {
			$prenom = mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
			$nom = mysql_real_escape_string(htmlspecialchars($_POST['nom']));
			$username = mysql_real_escape_string(htmlspecialchars($_POST['username']));
			$mail = mysql_real_escape_string(htmlspecialchars($_POST['mail']));
			$color = mysql_real_escape_string(htmlspecialchars($_POST['color']));
			
			// Cryptage mdp
			$mdp1 = sha1($passe);
			
			mysql_query("INSERT INTO users VALUES('', '$prenom', '$nom', '$username', '$mail', '$mdp1', '$color', 'Membre')");
		}
		
		else {
			echo 'Erreur : les deux mots de passe ne sont pas identiques.';
		}
	}

?>
