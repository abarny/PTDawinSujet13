<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="">

		<title>Header</title>

		<!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="navbar.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="container">

			<!-- Static navbar -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="ressources/Logo.png" alt="Logo TeamShare"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Accueil</a></li>
							
<!--
							<?php 
							if(!(isset($_SESSION['utilisateur'])))
								echo "<li><a href='#'>Gestion des tâches</a></li>";
								echo "<li><a href='#'>Gestion des utilisateurs</a></li>";
							?>
-->

							<li><a href='#'>Gestion des tâches</a></li>
							<li><a href='#'>Gestion des utilisateurs</a></li>
							<li><a href='#'>Aide</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						
<!--
							<?php 
							if(!(isset($_SESSION['utilisateur'])))
								echo "<li><a href=''>S'inscrire</a></li>";
								echo "<li><a href=''>Se connecter</a></li>";
							else
								echo "<li><a href=''>Gestion du compte</a></li>";
								echo "<li><a href=''>Se déconnecter</a></li>";
							?>
-->
							<li><a href=''>Gestion du compte</a></li>
							<li><a href=''>Se déconnecter</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			</nav>

		</div> <!-- /container -->


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
