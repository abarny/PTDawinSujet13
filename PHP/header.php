<?php
	include "isAdmin.php";
?>

<!DOCTYPE html>
<html lang='fr'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta name='description' content='Header du site'>
		<meta name='author' content='Hadrien'>
		<link rel='icon' href=''>

		<title>Header</title>

		<!-- Bootstrap core CSS -->
		<link href='../plugins/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>

		<!-- Custom styles for this template -->
		<link href='../css/header.css' rel='stylesheet'>
		<link href='../css/calendar.css' rel='stylesheet'>
		<link href='../css/inscription.css' rel='stylesheet' />
		<link href='../css/gestionCompte.css' rel='stylesheet' />
		<link href='../css/gestionUsers.css' rel='stylesheet' />
		<link href='../css/connexion.css' rel='stylesheet' />

			<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
			<script src='../plugins/bootstrap/dist/js/bootstrap.min.js'></script>
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src='../plugins/bootstrap/assets/js/ie10-viewport-bug-workaround.js'></script>

	 	<!-- datepicker, petit calendrier pour detail jour -->
 		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 		<script src="http://jqueryui.com/resources/demos/datepicker/datepicker-fr.js"></script>
 		
 		<!-- Ouveture du popup de connexion -->
		<script src="../javascript/connexion.js"></script>
		<script>
			function ouvrirPopup(){
				$(".blocConnexion").show("slow");
				$(".shadow").show();
			}
			
			function fermerPopup(){
				$(".blocConnexion").hide("slow");
				$(".shadow").hide();
			}
		</script>

		 <script>
		    $(function(){
		        var options = {
		         //   showOn: "button",
		          dateFormat: "yy-mm-dd",
		            firstDay: 1
		        };  
		        $(".datepicker").datepicker(options);
		    });
		
		</script>
				
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
			<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
		<![endif]-->
	</head>

	<body>

		<header>
		
			<div class='container'>
			
				<!-- <a href="calendar.php"><img class ='logo' src='../img/Logo.png' alt='Logo TeamShare'></a> -->
				<img alt="" src='../img/Logo3.png'>
				<!-- Static navbar -->
				<nav class='navbar navbar-default'>
					<div class='container-fluid'>

						<div class='navbar-header'>
							<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
								<span class='sr-only'>Toggle navigation</span>
								<span class='icon-bar'></span>
								<span class='icon-bar'></span>
								<span class='icon-bar'></span>
							</button>
							<a class="navbar-brand" href="calendar.php">
								<img class ='logo' alt="" src='../img/Logo2.png'>
							</a>
						</div>

						<div id='navbar' class='navbar-collapse collapse' ng-controller="HeaderController">
							<ul class='nav navbar-nav'>
								<li id='home'><a href='calendar.php'>Accueil</a></li>
								
								<?php
									if (isset($_SESSION['user'])){
										echo("<li id='dragndrop'><a href='dragjquery2.php'>Gestion des tâches</a></li>");
										if (isAdmin() == 1)
											echo("<li id='gestuser'><a href='gestionUsers.php'>Gestion des utilisateurs</a></li>");
									}
								?>
								<li id='help'><a href='help.php'>Aide</a></li>
							</ul>
							<ul class='nav navbar-nav navbar-right'>
							

								<?php
									if (isset($_SESSION['user'])){
										echo("<li id='gestcmpt'><a href='gestionCompte.php'>Gestion du compte</a></li>");
										echo("<li><a href='deconnexion.php'>Se déconnecter</a></li>");
									}
									else {
										echo("<li id='register'><a href='inscription.php'>S'inscrire</a></li>");
										echo("<li><a href='javascript:ouvrirPopup()'>Se connecter</a></li>");
									}
								?>
							</ul>
						</div><!--/.nav-collapse -->
					</div><!--/.container-fluid -->
				</nav>
				
				<div class='blocConnexion'>
					<form method="post" action="formulaireConnexion.php">
						<h3>Connexion</h3>
						<label>Login :</label> <input type="text" name="username" /> <br/>
						<label>Mot de passe :</label> <input type="password" name="password" /> <br/>
						
						<input type="submit" name="connect" value="Connexion" />
						<img alt="Fermeture popup" src="../img/fermeture.png" onclick="fermerPopup()" />
					</form>
				</div>
				
			</div> <!-- /container -->
	
		</header>

<!-- Filtre semi-transparent noir pour assombrissement lors de la connexion -->
<div class="shadow"></div>
