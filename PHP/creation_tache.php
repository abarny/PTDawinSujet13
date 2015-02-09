<?php 
// connexion à la base de données
include "connect.php";

function wd_remove_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    
    return $str;
}

$intitule = isset($_GET['intitule']) ? $_GET['intitule'] : '';
$description = isset($_GET['description']) ? $_GET['description'] : '';
$responsable = isset($_GET['responsable']) ? $_GET['responsable'] : '';
$dateDebut = isset($_GET['dateDebut']) ? $_GET['dateDebut'] : '';
$dateFin = isset($_GET['dateFin']) ? $_GET['dateFin'] : '';
$dureeEstimee = isset($_GET['dureeEstimee']) ? $_GET['dureeEstimee'] : '';

$intitule = wd_remove_accents($intitule, 'utf-8');

 $insert = $pdo->prepare('INSERT INTO taches 
    (title,start,end, description, heures_estim, responsable, id_groupe) VALUES (?,?,?,?,?,?,?)');
 $insert->execute(array($intitule,$dateDebut,$dateFin, $description, $dureeEstimee,$responsable, '0'));
 	
// 	$_GET['success'] = 'success';
// 	echo $_GET['success'];
echo $intitule;

?>