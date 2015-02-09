<?php

	session_start();


	function isAdmin(){
		include "connect.php";

		if (!isset($_SESSION['user']))
			return 0;
		else {
			$req = 'SELECT droits_admin FROM users WHERE id_user = ?';
			$query = $pdo->prepare($req);
			$query->execute(array($_SESSION['user']));

			$result = $query->fetch();

			return array_values($result)[0];
		}
	}

?>