<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta name="description" content="Formulaire d'inscription" />
	<meta name="author" content="Hadrien" />
	
	<link href='inscription.css' rel='stylesheet' />
	<link href='../iconselect/css/lib/control/iconselect.css' rel='stylesheet' />
	
	 <script src="../iconselect/lib/control/iconselect.js"></script>
	
	<title>Inscription</title>
</head>

<body>

	<form method="post">
	
		<div class="infos">
			<div class="nom">
				<input type="text" name="nom" value="Nom" required />
			</div>
			
			<div class="prenom">
				<input type="text" name="prenom" value="Prénom" required />
			</div>
			
			<div class="login">
				<input type="text" name="login" value="Nom d'utilisateur" required />
			</div>
			
			<div class="mail">
				<input type="text" name="mail" value="Adresse mail" required />
			</div>
		</div>
		
		<div class="password">
			<div class="pass">
			<label>Mot de passe :</label> <br/>
				<input type="password" name="mdp1" value="Password" required />
			</div>
			
			<div class="passConfirm">
			<label>Confirmer le mot de passe :</label> <br/>
				<input type="password" name="mdp2" value="drowssaP" required />
			</div>
		</div>
		
		<div class="color">
			<label> Couleur :</label>
			<div id="my-icon-select">
				<script type="text/javascript">
					var iconSelect;

				    window.onload = function(){
				    				
				        iconSelect = new IconSelect("my-icon-select");
				
				        var icons = [];
				        icons.push({'iconFilePath':'ressources/Color01.png', 'iconValue':'1'});
				        icons.push({'iconFilePath':'ressources/Color02.png', 'iconValue':'2'});
				        icons.push({'iconFilePath':'ressources/Color03.png', 'iconValue':'3'});
				        icons.push({'iconFilePath':'ressources/Color04.png', 'iconValue':'4'});
				        icons.push({'iconFilePath':'ressources/Color05.png', 'iconValue':'5'});
				        icons.push({'iconFilePath':'ressources/Color06.png', 'iconValue':'6'});
				        icons.push({'iconFilePath':'ressources/Color07.png', 'iconValue':'7'});
				        icons.push({'iconFilePath':'ressources/Color08.png', 'iconValue':'8'});
				        icons.push({'iconFilePath':'ressources/Color09.png', 'iconValue':'9'});
				        icons.push({'iconFilePath':'ressources/Color10.png', 'iconValue':'10'});
				        icons.push({'iconFilePath':'ressources/Color11.png', 'iconValue':'11'});
				        icons.push({'iconFilePath':'ressources/Color12.png', 'iconValue':'12'});
				        icons.push({'iconFilePath':'ressources/Color13.png', 'iconValue':'13'});
				        icons.push({'iconFilePath':'ressources/Color14.png', 'iconValue':'14'});
				        icons.push({'iconFilePath':'ressources/Color15.png', 'iconValue':'15'});
				        icons.push({'iconFilePath':'ressources/Color16.png', 'iconValue':'16'});
				        icons.push({'iconFilePath':'ressources/Color17.png', 'iconValue':'17'});
				        icons.push({'iconFilePath':'ressources/Color18.png', 'iconValue':'18'});
				        icons.push({'iconFilePath':'ressources/Color19.png', 'iconValue':'19'});
				        icons.push({'iconFilePath':'ressources/Color20.png', 'iconValue':'20'});
				
				        iconSelect.refresh(icons);
				
				    };
				</script>
			</div>
		</div>		
		
		<div class="button">
			<input type="submit" value="S'inscrire"/>
			<input type="reset" value="Effacer"/>
		</div>
		
	</form>
	
</body>

</html>
