<?php

	function getName() {
		include "connect.php";

		$req = 'SELECT nom_user FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function getFirstname() {
		include "connect.php";

		$req = 'SELECT prenom FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function getLogin() {
		include "connect.php";

		$req = 'SELECT username FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function getMail() {
		include "connect.php";

		$req = 'SELECT mail FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

	function getPass() {
		include "connect.php";

		$req = 'SELECT pass FROM users WHERE id_user = ?';
		$query = $pdo->prepare($req);
		$query->execute(array($_SESSION['user']));

		$result = $query->fetch();

		return array_values($result)[0];
	}

?>

<?php

	include "connect.php";

	if(isset($_POST["modify"])){

		// Vérification : tous les champs remplis
		if($_POST["nom"] == NULL OR $_POST["prenom"] == NULL OR $_POST["mail"] == NULL OR $_POST["login"] == NULL){

			?>
			<script type="text/javascript">
				alert("Tous les champs doivent \352tre remplis !");
				window.location.replace("gestionCompte.php");
			</script>
			<?php

		}

		else {

			session_start();
			// En cas de changement de mot de passe
			if ($_POST["oldPass"] != NULL AND $_POST["newPass1"] != NULL AND $_POST["newPass2"] != NULL) {
				// Vérification : ancien mot de passe bien renseigné
				if (md5($_POST["oldPass"]) == getPass()) {
					// Vérification : nouveau mot de passe et confirmation identiques
					if ($_POST["newPass1"] == $_POST["newPass2"]){
						// Vérification : longueur du nouveau mot de passe inférieure à 60 caractères
						if (strlen($_POST["newPass1"]) < 60){
							// Vérification : nouveau mot de passe différent de login
							if ($_POST["newPass1"] != $_POST["login"]){
								$reqMDP = "UPDATE `users` SET pass = ? WHERE id_user = ?";
								$queryMDP= $pdo->prepare($reqMDP);
								$queryMDP->execute(array(md5($_POST["newPass1"]), $_SESSION['user']));
								$registerOK = TRUE;
							}

							else
								?>
								<script type="text/javascript">
									alert("Votre login et votre mot de passe doivent \352tre diff\351rents !");
									window.location.replace("gestionCompte.php");
								</script>
								<?php
						}

						else
							?>
							<script type="text/javascript">
								alert("Votre mot de passe ne doit pas d\351passer <strong>60 caract\350res</strong> !");
								window.location.replace("gestionCompte.php");
							</script>
							<?php
					}

					else
						?>
						<script type="text/javascript">
							alert("Vous avez mal confirm\351  votre nouveau mot de passe !");
							window.location.replace("gestionCompte.php");
						</script>
						<?php
				}
				else
					?>
					<script type="text/javascript">
						alert("Vous avez mal renseign\351 votre ancien mot de passe !");
						window.location.replace("gestionCompte.php");
					</script>
					<?php
			}

			// Vérification : longueur du nouveau login inférieure à 60 caractères
			if (strlen($_POST["login"]) < 60){
				// Vérification : nouveau login inexistant dans la base de données (si nouveau login différent de l'ancien)
				if ($_POST["login"] != getLogin()){
					$sql = "SELECT username FROM users WHERE username = '".$_POST["login"]."' ";
					$sql = mysql_query($sql);
					$sql = mysql_num_rows($sql);
				}
				else
					$sql = 0;

				if($sql == 0){
						if (md5($_POST["login"]) != getPass()){
						$req = "UPDATE `users` SET prenom = ?, nom_user = ?, username = ?, mail = ? WHERE id_user = ?";
						$query = $pdo->prepare($req);
						$query->execute(array($_POST["prenom"], $_POST["nom"], $_POST["login"], $_POST["mail"], $_SESSION['user']));

						?>
						<script type="text/javascript">
							alert("Vos modifications ont \351t\351 prises en compte. Vous allez maintenant \352tre redirig\351 vers la page de gestion de compte...");
							window.location.replace("gestionCompte.php");
						</script>
						<?php
					}
				}

				else
					?>
					<script type="text/javascript">
						alert("Ce login existe d\351j\340 dans la base de donn\351es !");
						window.location.replace("gestionCompte.php");
					</script>
					<?php

			}

			else
				?>
				<script type="text/javascript">
					alert("Votre login ne doit pas d\351passer <strong>60 caract\350res</strong> !");
					window.location.replace("gestionCompte.php");
				</script>
				<?php
		}
	}

?>

<?php

	@mysql_close($bdd);

?>