<?php 
// connexion à la base de données
include "connect.php";

$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : '';

$delete = $pdo->prepare('DELETE FROM users 
    							WHERE id_user = ?');
$delete->execute(array($id_user));

$delete = $pdo->prepare('DELETE FROM membres_taches 
    							WHERE id_util = ?');
$delete->execute(array($id_user));

echo 'ok';


?>