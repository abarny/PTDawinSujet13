<?php

	// connexion a la BDD
	$host = "localhost";
	$user = "root";
	$pass = "";
	$bdd = "nom_bdd";

	// connexion
	@mysql_connect($host,$user,$pass) or die("Impossible de se connecter");
	@mysql_select_db("$bdd") or die("Impossible de se connecter");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta name="description" content="Formulaire d'inscription" />
	<meta name="author" content="Hadrien" />
	
	<link href='../css/gestionUsers.css' rel='stylesheet' />
	<link href='../plugins/iconselect/css/lib/control/iconselect.css' rel='stylesheet' />
	
	<script type="text/javascript" src="../plugins/jquery.js"></script>
	<script type="text/javascript" src="../javascript/gestionUsers.js"></script>
	
	<script type="text/javascript" src="../plugins/iconselect/lib/control/iconselect.js"></script>
	
	<title>Gestion des utilisateurs</title>
	
</head>

<body>

	<div class="container">

		<div class="deleteUser">
			<input type="button" name="deleteUser" value="Supprimer un utilisateur" />
		</div>
		
		<?php
		
			// Nombre de colonnes
			$NbrCol = 7;
			
			// Requête
			$query = 'SELECT nom, prenom, mail, login, droits FROM user';
			$result = mysql_query($query);
			
			// nombre de cellules a remplir
			$NbreData = mysql_num_rows($result);
			
			// affichage
			$NbrLigne = 0;
			if ($NbreData != 0) {
				$j = 1;
		
		?>
		
		<table id="usersList" name="usersList">
			<!-- Entête du tableau -->
			<thead>
				<tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
					<th>Login</th>
					<th>Nombre tâches semaine courante</th>
					<th>Nombre heures semaine courante</th>
					<th>Droits</th>
				</tr>
			</thead>
			
			<tbody>
			
			<?php
			
				while ($val = mysql_fetch_array($result)) 
				{
					if ($j%$NbrCol == 1) {
						$NbrLigne++;
						$fintr = 0;
			
			?>
			
			<tr>
				
				<?php
						
					} // fermeture du if
				
				?>
				
				<td>
				
					<?php
					
						// Données à afficher dans la cellule
						// A FAIRE
					
					?>
	
				</td>
				
				<?php
						
					if ($j%$NbrCol == 0) {
						$fintr = 1;
				
				?>
				
			</tr>
			
			<?php
			
					} // fermeture du if
					$j++;
				} // fermeture du while
				
				// fermeture derniere balise </tr>
				if ($fintr!=1) {
			
			?>
			
			</tr>
			
			<?php
			
				} // fermeture du if
				
			?>
			
			</tbody>
		</table>
		
		<?php
		
			} // fermeture du grand if
			// si il n'y a aucune données à afficher
			else {
		
		?>
		
		pas de données à afficher
		<?php
		
			} // fermeture du else
			
		?>

	</div>	

</body>

</html>

<?php

	mysql_close(); // Déconnexion de la base

?>

