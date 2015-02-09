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

	

?>