
<!--
	<?php
	/*
		function deleteUsers(){
			for ($i = 1; $i < 200; $i++)
			{
				if (isset($_POST[$i])){
					$deleteQuery = 'DELETE FROM `users` where id = ?';
					$deleteQuery->execute(array($i));
				}
			}
		}
	*/
	?>
-->

<!--
<?php

	/*if(isset($_POST[$i])) {
	    foreach($_POST[$i] AS $id) {
	    	$deleteQuery = 'DELETE FROM `users` where id = ?';
				$deleteQuery->execute(array($i));
	    }
	}*/

?>
-->


<?php 
include "header.php";
include "connect.php"; 
?>

<!-- JQuery -->
<script src="../plugins/jquery.js"></script>
<script src="../javascript/gestionUsers.js"></script>
<script>
    	$(document).ready(function () {
        $('#gestuser').addClass('active');

         $('#delete_user').click(function(){
				    	var id_user = $('.checkbox:checked').attr('id');
				    	$.ajax({
     						  url: 'delete_user.php',
     						  type: 'GET',
     						  data: "id_user="+id_user,
     						  dataType: 'html',
     						  success : function(data){
								location.reload(true);
								     						//  	$('body').append('<h1>'+data+'</h1>');
     						     						  	
     						  }
     						});
				    	 });
    	});
</script> 

	<div class="userContainer">

			<div class="deleteUser">
				<input type="button" id="delete_user" name="deleteUser" onclick="" value="Supprimer utilisateur(s) sélectionné(s)" />
			</div>
		
		<?php
		
			// Nombre de colonnes
			$NbrCol = 7;
			
			// Requète
			$query = 'SELECT id_user, nom_user, prenom, mail, username, droits_admin FROM users ORDER BY id_user';
			$result = mysql_query($query);
			
			// Nombre de cellules a remplir
			$NbreData = mysql_num_rows($result);
			
			// Affichage
			$NbrLigne = 0;
			if ($NbreData != 0) {
				$j = 1;
		
		?>
		
		<table id="usersList" name="usersList">
			<!-- EntÃƒÆ’Ã‚Âªte du tableau -->
			<thead>
				<tr>
					<th class="check">Sélection</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
					<th>Login</th>
					<!-- <th>Nombre tâches semaine courante</th>
					<th>Nombre heures semaine courante</th> -->
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
				
				<td class="check"><input type="checkbox" id="<?php echo $val['id_user'] ?>" class="checkbox" name="<?php echo $j ?>" /></td>
				<td> <?php echo utf8_encode($val['nom_user']); ?> </td>
				<td> <?php echo utf8_encode($val['prenom']); ?> </td>
				<td> <?php echo utf8_encode($val['mail']); ?> </td>
				<td> <?php echo utf8_encode($val['username']); ?> </td>
				<!-- <td> <?php /*echo ""; ?> </td>
				<td> <?php echo ""*/; ?> </td> -->
				<td>
					<select name="droit">
						<option>
							<?php
								if ($val['droits_admin'] == "0") echo "Membre";
								else echo "Admin";
							?>
						</option>
						<?php
						
							if ($val['droits_admin'] == "0") echo "<option> Admin </option>";

						?>
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
			// si il n'y a aucune données ÃƒÆ’Ã‚Â  afficher
			else {
		
		?>
		
		pas de données ÃƒÂ  afficher
		<?php
		
			} // fermeture du else
			
		?>

	</div>

</body>

</html>