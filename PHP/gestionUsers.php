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


<?php

	function deleteUsers(){
		for ($i = 1; $i < 200; $i++)
		{
			if (isset($_POST[$i])){
				$deleteQuery = 'DELETE FROM `users` where id = ?';
				$deleteQuery->execute(array($i));
			}
		}
	}

?>



<?php include "header.php"; 
?>

	<div class="userContainer">

			<div class="deleteUser">
				<input type="button" name="deleteUser" onclick="<?php deleteUsers() ?>" value="Supprimer utilisateur(s) sélectionné(s)" />
			</div>
		
		<?php
		
			// Nombre de colonnes
			$NbrCol = 7;
			
			// RequÃªte
			$query = 'SELECT nom_user, prenom, mail, username, droits_admin FROM users ORDER BY id_user';
			$result = mysql_query($query);
			
			// Nombre de cellules a remplir
			$NbreData = mysql_num_rows($result);
			
			// Affichage
			$NbrLigne = 0;
			if ($NbreData != 0) {
				$j = 1;
		
		?>
		
		<table id="usersList" name="usersList">
			<!-- EntÃªte du tableau -->
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
				<td> <?php echo utf8_encode($val['nom_user']); ?> </td>
				<td> <?php echo utf8_encode($val['prenom']); ?> </td>
				<td> <?php echo utf8_encode($val['mail']); ?> </td>
				<td> <?php echo utf8_encode($val['username']); ?> </td>
				<td> <?php echo ""; ?> </td>
				<td> <?php echo ""; ?> </td>
				<td>
					<select name="droit">
						<option>
							<?php
								if ($val['droits_admin'] == "0") echo "Membre";
								else echo "Admin";
							?>
						</option>
						<option>
							<?php
								if ($val['droits_admin'] == "0") echo "Admin";
								else echo "Membre";
							?>
						</option>
					</select>
				</td>
				
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
			// si il n'y a aucune données Ã  afficher
			else {
		
		?>
		
		pas de données à afficher
		<?php
		
			} // fermeture du else
			
		?>

	</div>	

</body>

</html>