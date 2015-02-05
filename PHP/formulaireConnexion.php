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
	$errorVoid = FALSE;
	$errorLogin = FALSE;
	$errorMDP = FALSE;
	
	// On regarde si l'utilisateur est bien passé par le module d'inscription
	if(isset($_POST["connect"])){
	
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$req = 'SELECT * FROM users WHERE username = ?';
			$query = $pdo->prepare($req);
			$query->execute(array($_POST['username']));
			
			if ($query->rowCount()) {
				$user = $query->fetch();
				
				if ($user['password'] == md5($_POST['password'])) {
					$currentUser = $user;
					$_SESSION['user'] = $currentUser['id'];
				}
				else $errorMDP = TRUE;
			}
			else $errorLogin = TRUE;
		}
		else $errorVoid = TRUE;
	}

?>

<?php

	@mysql_close($bdd);

?>

<?php 
	// Affichage erreur :
	if($errorVoid == TRUE)
		alert("Erreur : un ou plusieurs champ(s) est (sont) vide(s).");
	elseif($errorLogin == TRUE)
		alert("Erreur : cet utilisateur n'existe pas.");
	elseif($errorMDP == TRUE)
		alert("Erreur : mot de passe inconnu(s)");
?>
