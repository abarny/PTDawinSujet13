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
$adjoint1 = isset($_GET['adjoint1']) ? $_GET['adjoint1'] : '';
$adjoint2 = isset($_GET['adjoint2']) ? $_GET['adjoint2'] : '';
$adjoint3 = isset($_GET['adjoint3']) ? $_GET['adjoint3'] : '';
$dateDebut = isset($_GET['dateDebut']) ? $_GET['dateDebut'] : '';
$dateFin = isset($_GET['dateFin']) ? $_GET['dateFin'] : '';
$dureeEstimee = isset($_GET['dureeEstimee']) ? $_GET['dureeEstimee'] : '';

$intitule = wd_remove_accents($intitule, 'utf-8');

$insert = $pdo->prepare('INSERT INTO taches 
    (title,start,end, description, heures_estim, responsable, id_groupe) VALUES (?,?,?,?,?,?,?)');
$insert->execute(array($intitule,$dateDebut,$dateFin, $description, $adjoint1,$responsable, '0'));

$id = $pdo->lastInsertId();

$insert = $pdo->prepare('INSERT INTO membres_taches 
    (id_util,id_tache) VALUES (?,?)');
$insert->execute(array($adjoint1,$id));

$insert = $pdo->prepare('INSERT INTO membres_taches 
    (id_util,id_tache) VALUES (?,?)');
$insert->execute(array($adjoint2,$id));

$insert = $pdo->prepare('INSERT INTO membres_taches 
    (id_util,id_tache) VALUES (?,?)');
$insert->execute(array($adjoint3,$id));




// 	$_GET['success'] = 'success';
// 	echo $_GET['success'];
echo $intitule;

?>