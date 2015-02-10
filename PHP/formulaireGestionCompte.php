<?php

	$error = FALSE;
	$errorMSG = FALSE;
	$registerOK = FALSE;

	function getName() {
		include "connect.php";

		$req = 'SELECT nom_user FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function getFirstname() {
		include "connect.php";

		$req = 'SELECT prenom FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function getLogin() {
		include "connect.php";

		$req = 'SELECT username FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function getMail() {
		include "connect.php";

		$req = 'SELECT mail FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function getPass() {
		include "connect.php";

		$req = 'SELECT pass FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function setError($MSG) {
		$error = TRUE;
		$errorMSG = $MSG;
	}

?>

<?php

	include "connect.php";

	if(isset($_POST["modify"])){

			// On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
		if($_POST["nom"] == NULL OR $_POST["prenom"] == NULL OR $_POST["mail"] == NULL OR $_POST["login"] == NULL){

			setError("Tous les champs doivent être remplis !");

		}

		else {

			session_start();

			if ($_POST["oldPass"] == NULL AND $_POST["newPass1"] == NULL AND $_POST["newPass2"] == NULL) {
				if (md5($_POST["oldPass"]) == getPass()) {
					if ($_POST["newPass1"] == $_POST["newPass2"]){
						if (strlen($_POST["newPass1"]) < 60){
							if ($_POST["newPass1"] != $_POST["login"]){
								$reqMDP = "UPDATE `users` SET pass = ? WHERE id_user = ?";
								$queryMDP= $pdo->prepare($reqMDP);
								$queryMDP->execute(array(md5($_POST["newPass1"]), $_SESSION['user']));
								$registerOK = TRUE;
							}

							else
								setError("Votre login et votre mot de passe doivent être différents !");
						}

						else
							setError("Votre mot de passe ne doit pas dépasser <strong>60 caractères</strong> !");
					}

					else
						setError("Vous avez mal renseigné votrer ancien mot de passe !");
				}

				else
					setError("Vous avez mal renseigné votre ancien mot de passe !");
			}

			if (strlen($_POST["login"]) < 60){
				$req = "UPDATE `users` SET prenom = ?, nom_user = ?, username = ?, mail = ? WHERE id_user = ?";
				$query = $pdo->prepare($req);
				$query->execute(array($_POST["prenom"], $_POST["nom"], $_POST["login"], $_POST["mail"], $_SESSION['user']));

				?>
				<script type="text/javascript">
					alert("Vos modifications ont \351t\351 prises en compte. Vous allez maintenant \352tre redirig\351 vers la page de gestion de compte...");
					window.location.replace("gestionCompte.php");
				</script>
				<?php
			}

			else
				setError("Votre login ne doit pas dépasser <strong>60 caractères</strong> !");
		}
	}

?>

<?php

	@mysql_close($bdd);

?>

<?php 
	// On affiche les erreurs :
	if($error == TRUE){ echo "<p align='center' style='color:red;'>$errorMSG</p>"; }
?>

<p class="auto-style1">&nbsp;</p>