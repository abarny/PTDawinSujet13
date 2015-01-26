<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta name="description" content="Formulaire d'inscription" />
	<meta name="author" content="Hadrien" />
	
	<link href='../css/gestionUsers.css' rel='stylesheet' />
	<link href='../plugins/iconselect/css/lib/control/iconselect.css' rel='stylesheet' />
	
	<script type="text/javascript" src="../plugins/jquery.js"></script>
	<script type="text/javascript" src="../javascript/gestionUsers.js"></script>
	
	<script type="text/javascript" src="../plugins/iconselect/lib/control/iconselect.js"></script>
	
	<title>Gestion des utilisateurs</title>
	
</head>

<body>

	<div class="deleteUser">
		<input type="button" name="deleteUser" value="Supprimer un utilisateur" />
	</div>


	<table id="usersList">
	<!-- Entête du tableau -->
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Email</th>
				<th>Login</th>
				<th>Nombre tâches semaine courante</th>
				<th>Nombre heures semaine courante</th>
				<th>Droits</th>
			</tr>
		</thead>
		
		<!-- Corps du tableau (ici : exemple) -->
		<tbody>
			<tr>
				<td>Vagrant</td>
				<td>Naro</td>
				<td>Naro@Vagrant@Etherval.fr</td>
				<td>LeVagabond</td>
				<td>3</td>
				<td>4</td>
				<td>Admin</td>
			</tr>
		</tbody>
	</table>

</body>

</html>
