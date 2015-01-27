<?php include "header.php"; 
?>

	<form method="post">
	
		<div class="infosClavier">
			<div class="infos">
				<div class="nom">
					<input type="text" name="nom" value="Nom" />
				</div>
				
				<div class="prenom">
					<input type="text" name="prenom" value="PrÃ©nom" />
				</div>
				
				<div class="login">
					<input type="text" name="login" value="Nom d'utilisateur" />
				</div>
				
				<div class="mail">
					<input type="text" name="mail" value="Adresse mail" />
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
			<input type="submit" value="S'inscrire"/>
			<input type="reset" value="RÃ©initialiser"/>
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
	
	<?php

		if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['login']) AND !empty($_POST['mail']) AND !empty($_POST['mdp1']) AND !empty($_POST['md2']))
		
		{
			/*
			CREATE TABLE `validation` (
			`id` INT( 255 ) NOT NULL AUTO_INCREMENT ,
			`prenom` VARCHAR( 255 ) NOT NULL ,
			`nom` VARCHAR( 255 ) NOT NULL ,
			`login ` VARCHAR( 255 ) NOT NULL ,
			`mail` VARCHAR( 255 ) NOT NULL ,
			`pass` VARCHAR( 255 ) NOT NULL ,
			`color` INT( 255 ) NOT NULL ,	
			`droits` VARCHAR( 255 ) NOT NULL ,
			INDEX ( `id` )
			);
			*/
			
			mysql_connect("localhost", "root", "");
			mysql_select_db("nom_db");
			
			// sécurités
			$mdp1 = mysql_real_escape_string(htmlspecialchars($_POST['mdp1']));
			$mdp2 = mysql_real_escape_string(htmlspecialchars($_POST['mdp2']));
			
			if($mdp1 == $mdp2) {
				$prenom = mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
				$nom = mysql_real_escape_string(htmlspecialchars($_POST['nom']));
				$login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
				$mail = mysql_real_escape_string(htmlspecialchars($_POST['mail']));
				$color = mysql_real_escape_string(htmlspecialchars($_POST['color']));
				
				// Cryptage mdp
				$mdp1 = sha1($passe);
				
				mysql_query("INSERT INTO validation VALUES('', '$prenom', '$nom', '$login', '$mail', '$mdp1', '$color', 1)");
			}
			
			else {
				echo 'Erreur : les deux mots de passe ne sont pas identiques.';
			}
		}

	?>

</body>

</html>
