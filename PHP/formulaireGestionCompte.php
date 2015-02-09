<?php

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

?>

<?php

	include "connect.php";

	$error = FALSE;
	if(isset($_POST["modify"])){

		// On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
		if($_POST["nom"] == NULL OR $_POST["prenom"] == NULL OR $_POST["mail"] == NULL OR $_POST["login"] == NULL){
		   
			// On met la variable $error à TRUE pour que par la suite le navigateur sache qu'il y'a une erreur à afficher.
			$error = TRUE;
		   
			// On écrit le message à afficher :
			$errorMSG = "Tous les champs doivent être remplis !";
			   
		}

		// On regarde si le mot de passe et le nom de compte n'est pas le même
		if($_POST["username"] != $_POST["mdp1"]){

			// Si c'est bon on regarde dans la base de donnée si le nom de compte est déjà utilisé :
			$sql = "SELECT username FROM users WHERE username = '".$_POST["username"]."' ";
			$sql = mysql_query($sql);

			// On compte combien de valeur à pour nom de compte celui tapé par l'utilisateur.
			$sql = mysql_num_rows($sql);
		   
			// Si $sql est égal à 0 (c'est-à-dire qu'il n'y a pas de nom de compte avec la valeur tapé par l'utilisateur
			if($sql == 0){

				$req = "UPDATE users SET prenom = ?, nom_user = ?, username = ?, mail = ? WHERE user_id = ?";
				$query = $pdo->prepare($req);
				$query->execute(array($_POST["prenom"], $_POST["nom"], $_POST["login"], $_POST["mail"], $_SESSION['user']));
			}
		}
	}

?>