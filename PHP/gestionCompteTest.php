<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta name="description" content="Formulaire d'inscription" />
	<meta name="author" content="Hadrien" />
	
	<link href='../css/gestionCompte.css' rel='stylesheet' />
	<link href='../plugins/iconselect/css/lib/control/iconselect.css' rel='stylesheet' />
	
	<script type="text/javascript" src="../plugins/jquery.js"></script>
	<script type="text/javascript" src="../javascript/gestionCompte.js"></script>
	
	<script type="text/javascript" src="../plugins/iconselect/lib/control/iconselect.js"></script>
	
	<title>Gestion du compte</title>
	
</head>

<body>

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
				<button>Modifier le mot de passe</button>
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
		include('sans_titre_1.phpverifInscription.php');
	?>

</body>

</html>
