
<head>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
</head>

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

?>

<?php

	// On met les variables utilisé dans le code PHP à FALSE (C'est-à-dire les désactiver pour le moment).
	$error = FALSE;
	$registerOK = FALSE;

	// On regarde si l'utilisateur est bien passé par le module d'inscription
	if(isset($_POST["register"])){
	   
		// On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
		if($_POST["nom"] == NULL OR $_POST["prenom"] == NULL OR $_POST["mail"] == NULL OR $_POST["username"] == NULL OR $_POST["mdp1"] == NULL OR $_POST["mdp2"] == NULL){
		   
			// On met la variable $error à TRUE pour que par la suite le navigateur sache qu'il y'a une erreur à afficher.
			$error = TRUE;
		   
			// On écrit le message à afficher :
			$errorMSG = "Tous les champs doivent être remplis !";
			   
		}
	   
		// Sinon, si les deux mots de passes correspondent :
		elseif($_POST["mdp1"] == $_POST["mdp2"]){
		   
			// On regarde si le mot de passe et le nom de compte n'est pas le même
			if($_POST["username"] != $_POST["mdp1"]){
			   
				// Si c'est bon on regarde dans la base de donnée si le nom de compte est déjà utilisé :
				$sql = "SELECT username FROM users WHERE username = '".$_POST["username"]."' ";
				$sql = mysql_query($sql);
			// On compte combien de valeur à pour nom de compte celui tapé par l'utilisateur.
			$sql = mysql_num_rows($sql);
		   
			  // Si $sql est égal à 0 (c'est-à-dire qu'il n'y a pas de nom de compte avec la valeur tapé par l'utilisateur
			  if($sql == 0){
			 
				  // Si tout va bien on regarde si le mot de passe n'exède pas 60 caractères.
				  if(strlen($_POST["mdp1"] < 60)){
				 
					// Si tout va bien on regarde si le nom de compte n'exède pas 60 caractères.
					if(strlen($_POST["username"] < 60)){
				   
						// Si le nom de compte et le mot de passe sont différent :
						if($_POST["username"] != $_POST["mdp1"]){
				   
						  // Si tout ce passe correctement, on peut maintenant l'inscrire dans la base de données :
						  // On crypte d'abord le mot de passe
						  $pass = $_POST["mdp1"];
						  $passCrypt = md5($pass);
						  
						  $sql = "INSERT INTO users (`nom_user`, `prenom`, `username`, `mail`, `pass`, `color`, `droits_admin`) VALUES ('".$_POST["nom"]."', '".$_POST["prenom"]."', '".$_POST["username"]."', '".$_POST["mail"]."', '$passCrypt', '1', '0')";
						  $sql = mysql_query($sql);
						 
						  // Si la requête s'est bien effectué :
						  if($sql){
						 
							  // On met la variable $registerOK à TRUE pour que l'inscription soit finalisé
							  $registerOK = TRUE;
							  // On l'affiche un message pour le dire que l'inscription c'est bien déroulé :
							  $registerMSG = "Inscription réussie ! Vous êtes maintenant membre du site.";
							 
							  // On met des variables de session pour stocker le nom de compte et le mot de passe :
							  $_SESSION["nom_user"] = $_POST["nom"];
							  $_SESSION["prenom"] = $_POST["prenom"];
							  $_SESSION["username"] = $_POST["username"];
							  $_SESSION["mail"] = $_POST["mail"];
							  $_SESSION["pass"] = $passCrypt;
							  $_SESSION["color"] = 1;
							  $_SESSION["droits_admin"] = 0;
							 
							  // Comme un utilisateur est différent, on crée des variables de sessions pour "varier" l'utilisateur comme ceci :
							  // echo $_SESSION["username"]; (bien entendu avec les balises PHP, sinons cela ne marchera pas.
						 
						  }
						 
						  // Sinon on l'affiche un message d'erreur (généralement pour vous quand vous testez vos scripts PHP)
						  else{
						 
							  $error = TRUE;
							 
							  $errorMSG = "Erreur dans la requête SQL<br/>".$sql."<br/>";
						 
						  }
					   
						}
					   
						// Sinon on fais savoir à l'utilisateur qu'il a mis un nom de compte trop long.
						else{
					   
						  $error = TRUE;
						 
						  $errorMSG = "Votre nom compte ne doit pas dépasser <strong>60 caractères</strong> !";
						 
						  $login = NULL;
						 
						  $pass = $_POST["mdp1"];
					   
						}
				   
					}
				 
				  }
				 
				  // Si le mot de passe dépasse 60 caractères on le fait savoir
				  else{
				 
					$error = TRUE;
				   
					$errorMSG = "Votre mot de passe ne doit pas dépasser <strong>60 caractères</strong> !";
				   
					$login = $_POST["username"];
				   
					$pass = NULL;
				 
				  }
			 
			  }
			 
			  // Sinon on affiche un message d'erreur lui disant que ce nom de compte est déjà utilisé.
			  else{
			 
				  $error = TRUE;
				 
				  $errorMSG = "Le nom de compte <strong>".$_POST["username"]."</strong> est déjà utilisé !";
				 
				  $login = NULL;
				 
				  $pass = $_POST["mdp1"];
			 
			  }
			}
		   
			// Sinon on fais savoir à l'utilisateur qu'il doit changer le mot de passe ou le nom de compte
			else{
			   
				$error = TRUE;
			   
				$errorMSG = "Le nom de compte et le mot de passe doivent êtres différents !";
			   
			}
		   
		}
	 
	  // Sinon si les deux mots de passes sont différents :	 
	  elseif($_POST["mdp1"] != $_POST["mdp2"]){
	 
		$error = TRUE;
	   
		$errorMSG = "Les deux mots de passes sont différents !";
	   
		$login = $_POST["username"];
	   
		$pass = NULL;
	 
	  }
	 
	  // Sinon si le nom de compte et le mot de passe ont la même valeur :
	  elseif($_POST["username"] == $_POST["mdp1"]){
	 
		$error = TRUE;
	   
		$errorMSG = "Le nom de compte et le mot de passe doivent être différents !";
	 
	  }
	   
	}

?>

<?php

	  @mysql_close($bdd);

?>

<?php // On affiche les erreurs :
	  if($error == TRUE){ echo "<p align='center' style='color:red;'>$errorMSG</p>"; }
?>
<?php // Si l'inscription s'est bien déroulée on affiche le succès :
	  if($registerOK == TRUE){ echo "<p align='center' style='color:green;'><strong>$registerMSG</strong></p>"; }
?>
<p class="auto-style1">&nbsp;</p>
