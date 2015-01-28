<?php

	// Connexion a la BDD
	$host = "info-arie";
	$user = "hatran";
	$pass = "9JyGX1PHZdAp";
	$bdd = "info_hatran";

	// Connexion
	@mysql_connect($host,$user,$pass) or die("Impossible de se connecter");
	@mysql_select_db("$bdd") or die("Impossible de se connecter");

?>

<!--
<?php

	$nbUsers= 0;
	
	function deleteUsers(){
		for ($i = 0; $i < $nbUsers; $i++)
		{
			if (isset($_POST[$i])){
				$deleteQuery = 'DELETE FROM `users` where id = ?';
				$deleteQuery->execute(array($i));
			}
		}
	}

?>
-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta name="description" content="Formulaire d'inscription" />
	<meta name="author" content="Hadrien" />
	
	<link href='../css/gestionUsers.css' rel='stylesheet' />
	
	<title>Gestion des utilisateurs</title>
	
</head>

<body>

	<div class="container">

			<div class="deleteUser">
				<input type="button" name="deleteUser" onclick=" <?php deleteUsers() ?>" value="Supprimer utilisateur(s) sélectionné(s)" />
			</div>
		
		<?php
		
			// Nombre de colonnes
			$NbrCol = 7;
			
			// Requête
			$query = 'SELECT nom, prenom, mail, username, droits FROM users';
			$result = mysql_query($query);
			
			// Nombre de cellules a remplir
			$NbreData = mysql_num_rows($result);
			
			// Affichage
			$NbrLigne = 0;
			if ($NbreData != 0) {
				$j = 1;
		
		?>
		
		<table id="usersList" name="usersList">
			<!-- Entête du tableau -->
			<thead>
				<tr>
					<th class="check">Sélection</th>
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
					if ($j % $NbrCol == 1) {
						$NbrLigne++;
						$fintr = 0;
			
			?>
			
			<tr>
				
				<?php
						
					} // Fermeture du if
				
				?>
				
				<td class="check"><input type="checkbox" name="<?php echo $j ?>" /></td>
				<td> <?php echo utf8_encode($val['nom']); ?> </td>
				<td> <?php echo utf8_encode($val['prenom']); ?> </td>
				<td> <?php echo utf8_encode($val['mail']); ?> </td>
				<td> <?php echo utf8_encode($val['username']); ?> </td>
				<td> <?php echo ""; ?> </td>
				<td> <?php echo ""; ?> </td>
				<td>
					<select name="droit">
						<option> <?php echo utf8_encode($val['droits']); ?> </option>
						<option>
							<?php
								if ($val['droits'] == "Admin") echo "Membre";
								else echo "Admin";
							?>
						</option>
					</select>
				</td>
				
				<?
				
					$nbUsers++;
				
				?>
				
			</tr>

				<?php
						
					if ($j % $NbrCol == 0) {
						$fintr = 1;
				
				?>
			
			<?php
			
					} // Fermeture du if
					$j++;
				} // Fermeture du while
				
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