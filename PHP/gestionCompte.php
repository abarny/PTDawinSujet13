<?php include "header.php"; 
?>

	<form method="post">
	
		<div class="infosClavier">
			<div class="infos">
				<div class="nom">
					<input type="text" name="nom" value="Nom" />
				</div>
				
				<div class="prenom">
					<input type="text" name="prenom" value="Prénom" />
				</div>
				
				<div class="login">
					<input type="text" name="login" value="Nom d'utilisateur" />
				</div>
				
				<div class="mail">
					<input type="text" name="mail" value="Adresse mail" />
				</div>
			</div>
			
			<div class="passwordButton">
				<input type="button" id="displayPass" name="displayPass" value="Modifier le mot de passe" />
			</div>
			
			<div class="password">
				<div class="passOld">
					<label>Ancien mot de passe :</label> <br/>
					<input type="password" name="oldmdp" />
				</div>

			
				<div class="pass">
					<label>Nouveau mot de passe :</label> <br/>
					<input type="password" name="mdp1" />
				</div>
				
				<div class="passConfirm">
					<label>Confirmer le nouveau mot de passe :</label> <br/>
					<input type="password" name="mdp2" />
				</div>
			</div>
		</div>
		
		<div class="button">
			<input type="submit" value="S'inscrire"/>
			<input type="reset" value="Réinitialiser"/>
		</div>
		
		<div class="color">
			<label id="color"> Couleur :</label>
			<div id="my-icon-select">
				<script type="text/javascript">
					var iconSelect;

				    window.onload = function(){
				    				
				        iconSelect = new IconSelect("my-icon-select");
				
				        var icons = [];
				         icons.push({'iconFilePath':'../Includes/colorRessources/Color01.png', 'iconValue':'1'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color02.png', 'iconValue':'2'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color03.png', 'iconValue':'3'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color04.png', 'iconValue':'4'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color05.png', 'iconValue':'5'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color06.png', 'iconValue':'6'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color07.png', 'iconValue':'7'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color08.png', 'iconValue':'8'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color09.png', 'iconValue':'9'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color10.png', 'iconValue':'10'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color11.png', 'iconValue':'11'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color12.png', 'iconValue':'12'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color13.png', 'iconValue':'13'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color14.png', 'iconValue':'14'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color15.png', 'iconValue':'15'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color16.png', 'iconValue':'16'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color17.png', 'iconValue':'17'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color18.png', 'iconValue':'18'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color19.png', 'iconValue':'19'});
				        icons.push({'iconFilePath':'../Includes/colorRessources/Color20.png', 'iconValue':'20'});
				
				        iconSelect.refresh(icons);
				
				    };
				</script>
			</div>
		</div>		
		
	</form>

</body>

</html>
