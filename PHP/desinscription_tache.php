<?php 
// connexion à la base de données
include "connect.php";

$id_util = isset($_GET['id_util']) ? $_GET['id_util'] : '';
$id_tache = isset($_GET['id_tache']) ? $_GET['id_tache'] : '';

$insert = $pdo->prepare('DELETE FROM membres_taches 
    							WHERE id_util = ?
    							AND id_tache = ?');
$insert->execute(array($id_util,$id_tache));

echo 'ok';

?>