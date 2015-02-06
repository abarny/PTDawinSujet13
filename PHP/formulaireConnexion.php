<?php
	session_start()
?>

<?php
	include "connect.php";
?>

<?php
	// On met les variables utilisÃƒÂ© dans le code PHP ÃƒÂ  FALSE (C'est-ÃƒÂ -dire les dÃƒÂ©sactiver pour le moment).
	$errorVoid = FALSE;
	$errorLogin = FALSE;
	$errorMDP = FALSE;
	
	// On regarde si l'utilisateur est bien passÃƒÂ© par le module d'inscription
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
					?>
						<script type="text/javascript">
							alert("F\351licitations, vous \352tes d\351sormais connect\351. Vous allez maintenant être redirig\351 vers la page d'accueil...");
							window.location.replace("calendar.php");
						</script>
					<?php
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
		?>
			<script type="text/javascript">
				alert("Erreur : un (ou plusieurs) champ(s) est (ou sont) incorrect(s). Vous allez maintenant \352tre redirig\351 vers la page d'accueil...");
				window.location.replace("calendar.php");
			</script>
		<?php
	}
	elseif($errorLogin == TRUE) {
		?>
			<script type="text/javascript">
				alert("Erreur : cet utilisateur n'existe pas. Vous allez maintenant \352tre redirig\351 vers la page d'accueil...");
				window.location.replace("calendar.php");
			</script>
		<?php
	}
	elseif($errorMDP == TRUE) {
		?>
			<script type="text/javascript">
				alert("Erreur : mauvais mot de passe. Vous allez maintenant \352tre redirig\351 vers la page d'accueil...");
				window.location.replace("calendar.php");
			</script>
		<?php
	}

?>
