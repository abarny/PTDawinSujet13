<?php 
include "header.php";
include "connect.php"; 
?>

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
			
			<div class="color">
				<label id="color"> Couleur :</label>
				<div id="my-icon-select">
					<script type="text/javascript">
						var iconSelect;
	
					    window.onload = function(){
					    				
					        iconSelect = new IconSelect("my-icon-select");
					
					        var icons = [];
					        icons.push({'iconFilePath':'../img/Colors/Color01.png', 'iconValue':'1'});
					        icons.push({'iconFilePath':'../img/Colors/Color02.png', 'iconValue':'2'});
					        icons.push({'iconFilePath':'../img/Colors/Color03.png', 'iconValue':'3'});
					        icons.push({'iconFilePath':'../img/Colors/Color04.png', 'iconValue':'4'});
					        icons.push({'iconFilePath':'../img/Colors/Color05.png', 'iconValue':'5'});
					        icons.push({'iconFilePath':'../img/Colors/Color06.png', 'iconValue':'6'});
					        icons.push({'iconFilePath':'../img/Colors/Color07.png', 'iconValue':'7'});
					        icons.push({'iconFilePath':'../img/Colors/Color08.png', 'iconValue':'8'});
					        icons.push({'iconFilePath':'../img/Colors/Color09.png', 'iconValue':'9'});
					        icons.push({'iconFilePath':'../img/Colors/Color10.png', 'iconValue':'10'});
					        icons.push({'iconFilePath':'../img/Colors/Color11.png', 'iconValue':'11'});
					        icons.push({'iconFilePath':'../img/Colors/Color12.png', 'iconValue':'12'});
					        icons.push({'iconFilePath':'../img/Colors/Color13.png', 'iconValue':'13'});
					        icons.push({'iconFilePath':'../img/Colors/Color14.png', 'iconValue':'14'});
					        icons.push({'iconFilePath':'../img/Colors/Color15.png', 'iconValue':'15'});
					        icons.push({'iconFilePath':'../img/Colors/Color16.png', 'iconValue':'16'});
					        icons.push({'iconFilePath':'../img/Colors/Color17.png', 'iconValue':'17'});
					        icons.push({'iconFilePath':'../img/Colors/Color18.png', 'iconValue':'18'});
					        icons.push({'iconFilePath':'../img/Colors/Color19.png', 'iconValue':'19'});
					        icons.push({'iconFilePath':'../img/Colors/Color20.png', 'iconValue':'20'});
					
					        iconSelect.refresh(icons);
					
					    };
					</script>
				</div>
			</div>		
			
		</form>
	</div>
	
	<?php include "formulaireInscription.php";
	?>

</body>

</html>
