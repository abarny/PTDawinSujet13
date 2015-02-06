<?php
	include "connect.php";
?>

<?php
	// On met les variables utilisÃ© dans le code PHP Ã  FALSE (C'est-Ã -dire les dÃ©sactiver pour le moment).
	$errorVoid = FALSE;
	$errorLogin = FALSE;
	$errorMDP = FALSE;
	
	// On regarde si l'utilisateur est bien passÃ© par le module d'inscription
	if(isset($_POST["connect"])){
	
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$req = 'SELECT * FROM users WHERE username = ?';
			$query = $pdo->prepare($req);
			$query->execute(array($_POST['username']));
			
			if ($query->rowCount()) {
				$user = $query->fetch();
				
				if ($user['pass'] == md5($_POST['password'])) {
					$currentUser = $user;
					$_SESSION['user'] = $currentUser['id_user'];
					echo "Connect�";
					echo "<p>Cliquez <a href='calendar.php'>ici</a> pour revenir � la page d'accueil</p>";
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
	if($errorVoid == TRUE) {
		echo "Erreur : un ou plusieurs champ(s) est (sont) vide(s).";
		echo "<p>Cliquez <a href='calendar.php'>ici</a> pour revenir � la page d accueil</p>";
	}
	elseif($errorLogin == TRUE) {
		echo "Cet utilisateur n'existe pas.";
		echo "<p>Cliquez <a href='calendar.php'>ici</a> pour revenir � la page d accueil</p>";
	}
	elseif($errorMDP == TRUE) {
		echo "Mot de passe inconnu.";
		echo "<p>Cliquez <a href='calendar.php'>ici</a> pour revenir � la page d accueil</p>";
	}

?>
