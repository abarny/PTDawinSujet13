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

		<link href='../plugins/iconselect/css/lib/control/iconselect.css' rel='stylesheet' />
	
	 	<script src="../plugins/iconselect/lib/control/iconselect.js"></script>
	 	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

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
				
			}
			
			function fermerPopup(){
				$(".blocConnexion").hide("slow");
			}
		</script>

		 <script>
		    $(function(){
		        var options = {
		            showOn: "button",
		            firstDay: 1
		        };  
		        $("#datepicker").datepicker(options);
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
			
				<img class ='logo' src='../img/Logo.png' alt='Logo TeamShare'>
	
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
							<a class='navbar-brand' href='#'></a>
						</div>


						<div id='navbar' class='navbar-collapse collapse' ng-controller="HeaderController">
							<ul class='nav navbar-nav'>
								<li class="active"><a href='calendar.php'>Accueil</a></li>
								
	
								<li><a href='dragjquery2.php'>Gestion des tâches</a></li>
								<li><a href='gestionUsers.php'>Gestion des utilisateurs</a></li>
								<li><a href='#'>Aide</a></li>
							</ul>
							<ul class='nav navbar-nav navbar-right'>
							

								<li><a href='gestionCompte.php'>Gestion du compte</a></li>
								<li><a href='inscription.php'>S'inscrire</a></li>
								<li><a href='javascript:ouvrirPopup()'>Se connecter</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div><!--/.container-fluid -->
				</nav>
				
				<div class='blocConnexion'>
				
					<h3>Connexion</h3>
					<label>Login :</label> <input type="text" /> <br/>
					<label>Mot de passe :</label> <input type="password" /> <br/>
					
					<input type="submit" value="Connexion" />
					<input type="button" value="Abandonner la connexion" onclick="fermerPopup()" />
				
				</div>
				
			</div> <!-- /container -->
	




		</header>


