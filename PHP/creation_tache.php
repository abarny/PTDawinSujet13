<?php 
// connexion à la base de données
include "connect.php";



$intitule = isset($_GET['intitule']) ? $_GET['intitule'] : '';
$description = isset($_GET['description']) ? $_GET['description'] : '';
$responsable = isset($_GET['responsable']) ? $_GET['responsable'] : '';
$dateDebut = isset($_GET['dateDebut']) ? $_GET['dateDebut'] : '';
$dateFin = isset($_GET['dateFin']) ? $_GET['dateFin'] : '';
$dureeEstimee = isset($_GET['dureeEstimee']) ? $_GET['dureeEstimee'] : '';

 $insert = $pdo->prepare('INSERT INTO taches 
    (title,start,end, description, heures_estim, responsable, id_groupe) VALUES (?,?,?,?,?,?,?)');
 $insert->execute(array($intitule,$dateDebut,$dateFin, $description, $dureeEstimee,$responsable, '0'));
 	
// 	$_GET['success'] = 'success';
// 	echo $_GET['success'];
echo $intitule;

?>