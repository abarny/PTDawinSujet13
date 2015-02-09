<?php include "header.php"; 
?>
<script>
    	$(document).ready(function () {
        $('#register').addClass('active');
    	});
		</script> 
	<div class="inscription">
		<form method="post">
		
			<div class="infosClavier">
				<div class="infos">
					<div class="nom">
						<input type="text" name="nom" placeholder="Nom" />
					</div>
					
					<div class="prenom">
						<input type="text" name="prenom" placeholder="Prénom" />
					</div>
					
					<div class="username">
						<input type="text" name="username" placeholder="Nom d'utilisateur" />
					</div>
					
					<div class="mail">
						<input type="text" name="mail" placeholder="Adresse mail" />
					</div>
				</div>
				
				<div class="password">
					<div class="pass">
						<label>Mot de passe :</label> <br/>
						<input type="password" name="mdp1" />
					</div>
					
					<div class="passConfirm">
						<label>Confirmer le mot de passe :</label> <br/>
						<input type="password" name="mdp2" />
					</div>
				</div>
			</div>
			
			<div class="button">
				<input type="submit" name="register" value="S'inscrire"/>
				<input type="reset" name="reset" value="Rénitialiser"/>
			</div>		
			
		</form>
	</div>
	
	<?php include "formulaireInscription.php";
	?>

</body>

</html>
