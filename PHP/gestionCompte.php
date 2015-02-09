<?php include "header.php"; 
?>



<!-- JQuery -->
<script src="../plugins/jquery.js"></script>

<script src="../javascript/gestionCompte.js"></script>

<script>
 $(document).ready(function () {
 	$('#gestcmpt').addClass('active');
 });
 </script> 


<div class="gestionCompte">
	<form method="post">
	
		<div class="infos">
			<div class="nom">
				<input type="text" name="nom" placeholder="Nom" />
			</div>
			
			<div class="prenom">
				<input type="text" name="prenom" placeholder="Prénom" />
			</div>
			
			<div class="login">
				<input type="text" name="login" placeholder="Nom d'utilisateur" />
			</div>
			
			<div class="mail">
				<input type="text" name="mail" placeholder="Adresse mail" />
			</div>
		</div>
		
		<div class="passwordButton">
			<input type="button" class="passwordChange" value="Modifier le mot de passe" />
		</div>
				
		<div class="password">
			<div class="passOld">
				<label>Ancien mot de passe :</label> <br/>
				<input type="password" name="mdp1" />
			</div>

			<div class="pass">
				<label>Nouveau mot de passe :</label> <br/>
				<input type="password" name="mdp1" />
			</div>
			
			<div class="passConfirm">
				<label>Confirmer le nouveau mot de passe :</label> <br/>
				<input type="password" name="mdp2" />
			</div>
			
			<!-- TODO : mettre un bouton pour conserver l'ancien mot de passe (rÃƒÂ z des champs mdp et hide la div password) ? -->
			
		</div>
		
		
		<div class="button">
			<input type="submit" value="Enregistrer les modifications"/>
			<input type="reset" value="Réinitialiser"/>
		</div>	
		
	</form>

</div>
</body>

</html>
