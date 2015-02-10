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

	function getPass() {
		include "connect.php";
		
		$req = 'SELECT pass FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

?>

<?php

	include "connect.php";

	if(isset($_POST["modify"])){

		// On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
		/*
		if($_POST["nom"] == NULL OR $_POST["prenom"] == NULL OR $_POST["mail"] == NULL OR $_POST["login"] == NULL){
		   
			// On met la variable $error à TRUE pour que par la suite le navigateur sache qu'il y'a une erreur à afficher.
			$error = TRUE;
		   
			// On écrit le message à afficher :
			$errorMSG = "Tous les champs doivent être remplis !";
			   
		}

		else {

			/*$req = "UPDATE users SET prenom = '".$_POST["prenom"]."', nom_user = '".$_POST["nom"]."', username = '".$_POST["login"]."', mail = '".$_POST["mail"]."' WHERE user_id = '".$_SESSION["user"]."'";
			mysql_query($req);
			echo "<script>alert(Vos modifications ont bien été prises en compte.)</script>";
		*/

			session_start();
			$req = "UPDATE `users` SET prenom = ?, nom_user = ?, username = ?, mail = ? WHERE id_user = ?";
			$query = $pdo->prepare($req);
			$query->execute(array($_POST["prenom"], $_POST["nom"], $_POST["login"], $_POST["mail"], $_SESSION['user']));
			
			?>
			<script type="text/javascript">
				alert("Vos modifications ont \351t\351 prises en compte. Vous allez maintenant \352tre redirig\351 vers la page de gestion de compte...");
				window.location.replace("gestionCompte.php");
			</script>
			<?php
		/*
		}
		*/
	}

?>